<?php get_header(); ?>
    <div id="conteudo">

        <article class="single">

            

         <h1>
            <?php the_title(); ?>
         </h1>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="resumo_do_artigo"><?php the_excerpt(); ?></div>
         <hr>
         <p class="dados_do_post">By <span><?php the_author_posts_link(); ?> </span> - <?php the_time('j \d\e F ') ?><span class="pull-right"><i class="fa fa-comment-o"></i>   <?php comments_popup_link();?></span></p>

            <figure class="blog-artigo imagem_destacada"><!-- A classe blog-artigo foi adicionada para estilizar o media-p-->
                <?php the_post_thumbnail() ?>
            </figure>

            <div id="conteudo_post">
                 <?php the_content(); ?>
            </div>

        <?php endwhile; ?>

            <?php comments_template(); ?>

        <?php else: ?>

            <h2>Not Found</h2>
            <p>404</p>
            <p>Sorry, no articles were found</p>

        <?php endif; ?>

        <div class="autor_print">
              <p>
                <hr>
                    - Article Name: <strong><?php the_title(); ?> </strong><br>
                    - Author: <strong><?php the_author_link(); ?></strong><br>
                    - Published at: <strong><?php the_time('j \d\e F \d\e Y') ?></strong> <br>
                    - Do you like this content? Find more at: <strong><?php bloginfo('name') ?> - (<?php echo get_site_url(); ?>)</strong> <br>
                    </p>
                    <hr>
            </div>

    </article>
    </div>



</div> <!-- content -->

<?php get_footer(); ?> <!-- inclui o codigo do arquivo footer.php -->