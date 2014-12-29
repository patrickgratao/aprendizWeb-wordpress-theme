<?php get_header(); ?>
    <div id="conteudo" >

            <h1>Erro 404</h1>
            <br>
            <h3>Página não encontrada</h3>

            <div class="page-content">
                <p><?php _e( 'Nós não conseguimos encontrar o que você queria. Tente fazer uma busca', 'meutema' ); ?></p>
                <br>
                <?php get_search_form(); ?>
            </div><!-- .page-content -->

        </div><!-- #conteudo -->
<?php get_sidebar(); ?>
</div> <!-- content -->

<?php get_footer(); ?> <!-- inclui o código do arquivo footer.php -->
</div>