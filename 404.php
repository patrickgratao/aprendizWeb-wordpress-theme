<?php get_header(); ?>
    <div id="conteudo_com_sidebar" >
        <?php get_sidebar(); ?>
        <div class="single_page">

             <h1>Erro 404</h1>
            <h3>Página não encontrada.</h3>
            <div class="page-content">
                <p><?php _e( 'Nós não conseguimos encontrar o que você queria. Tente fazer uma busca', 'meutema' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .page-content -->
            <br>

            <img src="<?php bloginfo('template_directory'); ?>/img/404.jpg" title="Página não encontrada - Erro 404" alt="Imagem informando que a página que você procurou não foi encontrada">


        </div><!-- #conteudo -->
        </div>

</div> <!-- content -->

<div class="clear"></div>

<?php get_footer(); ?> <!-- inclui o código do arquivo footer.php -->
</div>