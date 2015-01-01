<?php get_header(); ?>
    <div id="conteudo">

        <div class="single">

          <div class="autor_print">
              <p>
                <hr>
                     - Nome do Artigo: <strong><?php the_title(); ?> </strong><br>
                      - Autor: <strong><?php the_author_link(); ?></strong><br>
                    - Data de Publicação: <strong><?php the_time('j \d\e F \d\e Y') ?></strong> <br>
                    - Gostou desse artigo? Encontre mais em: <strong><?php bloginfo('name') ?> - (<?php echo get_site_url(); ?>)</strong> <br>
                    </p>
                    <hr>
        </div>

         <h1>
            <?php the_title(); ?>
         </h1>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="resumo_do_artigo"><?php the_excerpt(); ?></div>
         <hr>
         <p class="dados_do_post">Por <span><?php the_author_posts_link(); ?> </span> - <?php the_time('j \d\e F ') ?><span class="pull-right">// <?php comments_popup_link();?></span></p>

            <figure class="imagem_destacada">
                <?php the_post_thumbnail() ?>
            </figure>
             <figcaption>Isso é uma legenda</figcaption>

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

 <div class="autor_print">
              <p>
                <hr>
                     - Nome do Artigo: <strong><?php the_title(); ?> </strong><br>
                      - Autor: <strong><?php the_author_link(); ?></strong><br>
                    - Data de Publicação: <strong><?php the_time('j \d\e F \d\e Y') ?></strong> <br>
                    - Gostou desse artigo? Encontre mais em: <strong><?php bloginfo('name') ?> - (<?php echo get_site_url(); ?>)</strong> <br>
                    </p>
                    <hr>
        </div>

    </div>
    </div>



</div> <!-- content -->

<?php get_footer(); ?> <!-- inclui o codigo do arquivo footer.php -->