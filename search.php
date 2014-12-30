<?php get_header(); ?>

<div id="conteudo_com_sidebar">
    <?php get_sidebar(); ?> <!-- Chamada da Sidebar-->
    <div class="single_page">

<h2><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>'); ?></h2>

<?php endwhile; else: ?>

<h2>Erro 404</h2>
<p>Nada Encontrado</p>

<?php endif; ?>

    </div>

</div> <!-- content -->

<?php get_footer(); ?>