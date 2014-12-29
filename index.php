<?php get_header(); ?>

<div id="conteudo">
    <div id="primary">
           <h3><span class="icon-star"></span> Todos os Artigos </h3>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="blog-artigo">
             <a href="<?php the_permalink(); ?>">
        <figure class="imagem_destacada">
            <?php the_post_thumbnail(); ?>
        </figure>
    </a>
    <div class="resumo">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
         <p class="dados_do_post">Por <span><?php the_author_link(); ?> </span> - <?php the_time('j \d\e F ') ?><span class="pull-right">//  <?php comments_number('0', '1', '%' );?> Comentários</span></p>
        <p><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>">Continue lendo >></a>
    </div>
</div>

<?php endwhile; ?>

<!-- Aqui vai a paginação -->
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

<?php else: ?>

<h2>404 - Nenhum Artigo foi Encontrado</h2>
     <div class="page-content">
                <p><?php _e( 'Nós não conseguimos encontrar o que você queria. Tente fazer uma busca', 'meutema' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .page-content -->
    <br>
    <img src="http://localhost/site/wp-content/uploads/2014/12/404.jpg" title="Página não encontrada - Erro 404" alt="Imagem informando que a página que você procurou não foi encontrada">


<?php endif; ?>

    </div>
    </div>
    <!-- aqui vai o sidebar -->
</div> <!-- content -->

<?php get_footer(); ?> <!-- inclue o código do arquivo footer.php -->