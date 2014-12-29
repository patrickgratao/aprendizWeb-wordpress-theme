<?php get_header(); ?>
<div id="conteudo">
    <div id="primary">
<h3 class="nome_autor">
    <!-- Se a pagina se refere a uma categoria -->
    <?php if (is_category()) { single_cat_title(); } ?>

    <!-- Se a pagina se refere a uma tag -->
    <?php if (is_tag()) {  single_tag_title(); } ?>

    <!-- Se a pagina se refere a um author -->
    <?php if (is_author()) {  echo "Autor: ". get_the_author(); } ?>
</h3>

    <hr>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="blog-artigo">
            <a href="<?php the_permalink(); ?>">
                <figure class="imagem_destacada">
            <?php the_post_thumbnail(); ?>
        </figure>
            </a>
            <div class="resumo">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>">Continue lendo >></a>
            </div>
        </div>

<?php endwhile; ?>

<!-- Aqui vai a paginação -->
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

<?php else: ?>

<h2>Nada Encontrado</h2>
    <p>Erro 404</p>
    <p>Lamentamos mas não foram encontrados artigos.</p>

<?php endif; ?>

    </div>
    <!-- aqui vai o sidebar -->
    <?php get_sidebar(); ?> <!-- inclue o código do arquivo sidebar.php -->
</div> <!-- content -->

<?php get_footer(); ?> <!-- inclue o código do arquivo footer.php -->