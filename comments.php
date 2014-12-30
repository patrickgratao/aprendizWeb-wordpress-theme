<?php
// Não excula essas linhas
    if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Por favor, não tente acessar este arquivo diretamente. Obrigado!');
    if ( post_password_required() ) { ?>
        <p class="nocomments">Este artigo está protegido por senha. Insira-a para ver os comentários.</p>

    <?php return; }
?>
<div id="comments">
    <header class="dtable">
        <h3 class="dtableCell">Deixe o seu comentário!
        <?php comments_popup_link();?>
        </h3>
    </header>

    <?php if ( have_comments() ) : ?>

        <div class="navigation">
            <?php paginate_comments_links(); ?>
        </div>
        <br>
        <ol class="commentlist">
            <?php wp_list_comments('avatar_size=64&type=comment&callback=mytheme_comment'); ?>
        </ol>
        <br>
        <div class="navigation">
            <?php paginate_comments_links(); ?>
        </div>
        <br>

    <?php else : echo "Não existem comentários";  ?>


    <?php endif; ?>
    <?php if ( comments_open() ) : ?>
    <div id="respond">

        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <fieldset>
                <?php if ( $user_ID ) : ?>

                <p>
                    Autentificado como
                    <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
                    <a href="<?php echo wp_logout_url(); ?>" title="Sair desta conta">Sair desta conta &raquo;</a>
                </p>
                <?php else : ?>

                      <header class="dtable">
                            <h3 class="dtableCell">Deixe o seu comentário!</h3>
                        </header>
                    <p>
                        <label for="author" class="label_box">Nome:</label>
                        <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="80"  placeholder="  Qual é o seu nome?"/>
                    </p>

                    <p>
                        <label for="email" class="label_box">Email:</label>
                        <input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="80" placeholder="  Seu email não será divulgado"/>
                     </p>

                    <p>
                        <label for="url" class="label_box">Website:</label>
                        <input type="text" name="url" id="url" value="<?php echo $comment_author_url_link; ?>" rel="nofollow" size="80" placeholder="  http://seusite.com.br"/>
                     </p>

                 <?php endif; ?>
                    <p>
                        <label for="comment" class="label_box">Mensagem:</label>
                        <textarea name="comment" id="comment" rows="5" cols="65" placeholder="  Sua Mensagem..."></textarea>
                    </p>
                    <p>
                        <input type="submit" class="btn btn-success commentsubmit" value="Enviar Comentário" />
                    </p>

                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
            </fieldset>
        </form>

     <p class="cancel"><?php cancel_comment_reply_link('Cancelar Resposta'); ?> </p>
    </div>
    <?php else : ?>
    <h3>Os comentários estão fechados.</h3>
<?php endif; ?>
</div>