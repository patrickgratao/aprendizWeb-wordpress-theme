<?php
// Não excula essas linhas
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Por favor, não tente acessar este arquivo diretamente. Obrigado!');

if ( post_password_required() ) { ?>
    <p class="nocomments">Este artigo está protegido por senha. Insira-a para ver os comentários.</p>
<?php return; }
?>
<div id="comments">

<header>
<h3>DEIXE SEU COMENTÁRIO!</h3>
</header>

    <?php if ( have_comments() ) : ?>

        <div class="navigation">
            <?php paginate_comments_links(); ?>
        </div>
        <ol class="commentlist">
            <?php wp_list_comments('avatar_size=64&type=comment&callback=mytheme_comment'); ?>
        </ol>
        <div class="navigation">
            <?php paginate_comments_links(); ?>
        </div>

     <?php else : echo "Não existem comentários";  ?>
    <?php endif; ?>
    <?php comment_form(); ?>
</div>