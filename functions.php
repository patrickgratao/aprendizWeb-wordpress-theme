<?php

register_nav_menus( array(
    'menu-topo' => 'Menu Topo',
) );

// Adiciona o campo de imagem destacada
add_theme_support( 'post-thumbnails' );

//Registrando as sidebar
register_sidebar(array(
'name'          => 'Barra Lateral Direita',
'id'            => 'sidebar_direito',
'description'   => 'Sidebar lateral direita',
'class'         => 'class-do-sidebar',
'before_widget' => '<div class="widget">',
'after_widget'  => "</div>\n",
'before_title'  => '<h3 class="widgettitle">',
'after_title'   => "</h3>\n",
));


function copyright_date() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "© " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}


// FUNCAO PARA APRESENTACAO DOS COMENTARIOS
function mytheme_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
extract($args, EXTR_SKIP);

// VERIFICA QUAL O ESTILO DO COMENTARIO "LI, DIV" E ACRESCENTA A TAG CORRETA AOS COMENTARIOS
if ( 'div' == $args['style'] ) {
$tag = 'div';
$add_below = 'comment';
} else {
$tag = 'li';
$add_below = 'div-comment';
}
?>

<!-- VERIFICA SE O COMENTARIO E REPLICA -->
<<?php echo $tag; ?>
<?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

<!-- INICIO DO CORPO DO COMENTARIO -->
<?php if ( 'div' != $args['style'] ) : ?>
<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
<?php endif; ?>
<div class="comment-author vcard">
<div class="avatar-autor">
<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
</div>

<!-- DADOS DO COMENTARIO (AUTOR, DIA, HORA) -->
<div class="comment-meta commentmetadata">
<?php
printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() );
echo ' em ';
?>
<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
<?php printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?>
</a>

<!-- EDITAR COMENTARIO -->
<?php edit_comment_link(__('Editar'), '<p>', '</p>'); ?>
</div>
</div>

<!-- VERIFICA SE O COMENTARIO AINDA NAO FOI APROVADO -->
<?php if ( $comment->comment_approved == '0' ) : ?>
<em class="comment-awaiting-moderation"><?php _e( 'Seu comentário ainda não foi aprovado.' ); ?></em>
<br />
<?php endif; ?>

<!-- TEXTO DO COMENTARIO -->
<?php comment_text(); ?>

<!-- LINK PARA REPLICA DO COMENTARIO -->
<div class="reply">
<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
</div>

<?php if ( 'div' != $args['style'] ) : ?>
</div>
<?php endif; ?>
<?php
}

function wp_custom_breadcrumbs() {

  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Início'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb

  global $post;
  $homeLink = get_bloginfo('url');

  if (is_home() || is_front_page()) {

    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';

  } else {

    echo '<section id="crumbs"> >> Você está em: <a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'categoria "' . single_cat_title('', false) . '"' . $after;

    } elseif ( is_search() ) {
      echo $before . 'Resultados da pesquisa por "' . get_search_query() . '"' . $after;

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Tags  "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Artigos escritos por ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Página não encontrada - Erro 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</section>';

  }
} // end wp_custom_breadcrumbs()

/*customização patryck */
// Custom WordPress Login Logo

function my_login_logo() {

?>

<style type="text/css">

body.login div#login h1 a {

background-image: url(aqui_vai_o_logo_do_site);

width: 300px;

-webkit-background-size: 300px 82px;

background-size: 300px 82px;

}

body.login {
    background-color: #00496c;
    padding: 10px;
}

body.login form {
    border-radius: 2%;
    background-color: rgba(0,0,0, 0.5);
}
body.login form label {
        color: white;
}

}

</style>
<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );
//Fim do custom logo login


//trocando Link na tela de login para a página inicial
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Blog Aprendiz Web - Área de Login';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//Fim troca de link draco

// Customizar o Footer do WordPress
function remove_footer_admin () {
    echo '© Esse tema foi customizado por <a href="http://patryck.com.br/" target="_blank">Patryck Gratão</a> especialmente para o blog Aprendiz Web';
}
add_filter('admin_footer_text', 'remove_footer_admin');

//fim da customização do rodape

require_once('wp_bootstrap_navwalker.php');
register_nav_menus( array(
    'primary' => __( 'Main Menu', 'aprendizweb' ),
) );

?>