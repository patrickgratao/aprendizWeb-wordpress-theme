<?php get_header(); ?>
    <div id="conteudo">
        <div class="single">
         <h1>
            <?php the_title(); ?>
         </h1>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="resumo_do_artigo"><?php the_excerpt(); ?></div>
         <hr>
         <p class="autor">Publicado por <span><?php the_author_link(); ?> </span> em <?php the_date(); ?><span class="pull-right">//  <?php comments_number('0', '1', '%' );?> Comentários</span></p>

            <figure class="imagem_destacada">
                <?php the_post_thumbnail() ?>
            </figure>

            <div id="conteudo_post">
                 <?php the_content(); ?>
            </div>

            <div id="autor">
                <h4>Autor: <?php the_author(); ?></h4>
                <figure>
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
                </figure>
                <div class="autor-info">
                    <p><?php the_author_description(); ?></p>
                </div>
                <div><a href = "<?php the_author_url ();?>" itemprop="url"><?php the_author(); ?></a></div>


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

    <!-- aqui vai o sidebar -->
    <?php get_sidebar(); ?> <!-- inclui o codigo do arquivo sidebar.php -->

</div> <!-- content -->

<?php get_footer(); ?> <!-- inclui o codigo do arquivo footer.php -->