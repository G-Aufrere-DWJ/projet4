<?php ob_start(); ?>

    
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div id="article_seul" class="container bg-white">
            <div class="row">
                <div id="whole_chapter" class="col-lg-11">
                    <h3>
                        <?php echo $post->title; ?>
                        <em>le <?= $post->creation_date ?></em>
                    </h3>
                    
                    <p>
                        <?= ($post->post) ?>
                    </p>
                </div>
            </div>
        </div>

        <section id="comments">
            <div id="posts_comments" class="container bg-dark">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 mb-5 mt-5">
                        <h2 class="text-center mt-4 mb-5 text-white">Commentaires</h2>

                        <?php
                        while ($comment = $comments->fetch())
                            {
                            ?>
                            <div id="display_comment" class="pt-1 pl-4 pb-4">
                                
                                        <p id="whose_comment" class="text-capitalize"><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['creation_date'] ?></p>
                                        <p id="content_comment"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

                                    <?php if (!empty($_SESSION['id']) && ($_SESSION['role'] > 0 )) { ?>
                                    <a href="index.php?action=signalComment&id=<?= ($comment['id'])?>&post_id=<?= $_GET['id']?>" class="btn btn-danger offset-8" role="button">Signaler le commentaire</a>
                                    <?php } ?>
                                <?php
                                }
                                ?>
                                
                            </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="leave_comment">
            <div class="container bg-dark">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 mb-5 mt-5">
                <?php if (isset($_SESSION['id'])) {
                    if (!empty($_SESSION['id']) && ($_SESSION['role'] > 0 )) { ?>
                        <div id="form_comment">
                            <form action="index.php?action=addComment&id=<?= $post->id ?>" method="post">
                        <div class="text-center col-12">
                            <label class="text-center mt-4 mb-5 text-white" for="comment">Laisser un commentaire</label><br />
                            <textarea id="comment" class="form-control" name="comment"></textarea>
                        </div>
                        <div class="text-center col-12">
                            <input type="submit" class="btn btn-primary mt-4" />
                        </div>
                            </form> 
                        </div>
                                    <?php } ?>
                                    <?php } ?>
                        </div>
                    </div>
            </div>
        </section>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>