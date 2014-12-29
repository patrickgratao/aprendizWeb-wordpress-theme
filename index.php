<?php get_header(); ?>

<div id="conteudo">
    <div id="primary">
           <h3><span class="icon-star"></span> Artigos</h3>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="blog-artigo">
             <a href="<?php the_permalink(); ?>">
        <figure class="imagem_destacada">
            <?php the_post_thumbnail(); ?>
        </figure>
    </a>
    <div class="resumo">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
         <p class="dados_do_post">&copy Publicado por <span><?php the_author_link(); ?> </span> em <?php the_time('j \d\e F \d\e Y') ?><span class="pull-right">//  <?php comments_number('0', '1', '%' );?> Comentários</span></p>
        <p><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>">Continue lendo >></a>
    </div>
</div>

<?php endwhile; ?>

<!-- Aqui vai a paginação -->
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

<?php else: ?>

<h2>Nenhum Artigo foi Encontrado</h2>
    <p>Erro 404</p>
    <p>Lamentamos mas não foram encontrados artigos.</p>

<?php endif; ?>

    </div>
    </div>
    <!-- aqui vai o sidebar -->
    <?php get_sidebar(); ?> <!-- inclue o código do arquivo sidebar.php -->
</div> <!-- content -->

<?php get_footer(); ?> <!-- inclue o código do arquivo footer.php -->