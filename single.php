<?php get_header(); ?>
    <div id="conteudo">
        <div class="single">
         <h1>
            <?php the_title(); ?>
         </h1>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="resumo_do_artigo"><?php the_excerpt(); ?></div>
         <hr>
         <p class="dados_do_post">Por <span><?php the_author_link(); ?> </span> - <?php the_time('j \d\e F ') ?><span class="pull-right">//  <?php comments_number('0', '1', '%' );?> Comentários</span></p>

            <figure class="imagem_destacada">
                <?php the_post_thumbnail() ?>
            </figure>

            <div id="conteudo_post">
                 <?php the_content(); ?>
            </div>

        <?php endwhile; ?>

            <?php comments_template(); ?>

        <?php else: ?>

            <h2>Nada Encontrado</h2>
            <p>Erro 404</p>
            <p>Lamentamos mas não foram encontrados artigos.</p>

        <?php endif; ?>

    </div>
    </div>



</div> <!-- content -->

<?php get_footer(); ?> <!-- inclui o codigo do arquivo footer.php -->