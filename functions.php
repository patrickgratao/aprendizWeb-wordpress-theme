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

// Registrando o sidebar2
register_sidebar(array(
'name'          => 'Sidebar do Rodapé',
'id'            => 'sidebar_footer',
'description'   => 'Sidebar do footer',
'class'         => ' ',
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
?>