<?php get_header(); ?>
    <div id="conteudo_com_sidebar" >
        <?php get_sidebar(); ?>
        <div class="single_page">

             <h1>404</h1>
            <h3>Not found</h3>
            <div class="page-content">
                <p><?php _e( "Sorry, nothing found. Let's try a search?", 'meutema' ); ?></p>
                <?php get_search_form(); ?>

            <br>

            <img src="<?php bloginfo('template_directory'); ?>/img/404.jpg" title="Not Found - 404" alt="Not Found" width="600px">
            </div><!-- .page-content -->

        </div><!-- #conteudo -->
        </div>

<div class="quebra_de_quadro"></div>

<?php get_footer(); ?> <!-- inclui o código do arquivo footer.php -->
</div>