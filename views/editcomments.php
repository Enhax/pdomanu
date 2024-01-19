<main class="container">
<h2>Modifier le commentaire</h2>
    <form method="POST">
        <div class="form-add">

            <div>
                <label>Content</label>
                <textarea name="content" row="20" col="10" style="resize:none" ;><?= $coms->content ?></textarea>
                <?php if (!empty($errors['content'])) : ?>
                    <?= $errors['content'] ?>
                <?php endif ?>
            </div>

            <div>
                <input type="hidden" name="id" value="<?= $comments->id ?>">
            </div>
            <?php if (!empty($success['editcomments'])) : ?>
                <?= $success['editcomments'] ?>
            <?php endif ?>
            <?php if (!empty($errors['editcomments'])) : ?>
                <?= $errors['editcomments'] ?>
            <?php endif ?>

            <button style="background-color:#0f0;"><a style="cursor:pointer;text-decoration:none;color:#fff;" href="/seemore <?= '?id=' . $coms->id_posts ?> ">Retour</a></button>&nbsp;&nbsp;&nbsp;
            <button type="submit" style="background-color:#09f;cursor:pointer;">Modifier</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button id="openModalBtn3" style="cursor:pointer;text-decoration:none;color:#fff;background-color:#f00">Supprimer</button>
    </form>
    <div id="modalContainer3">
        <div class="modal" id="modal3">
            <h3 id="modalText3" style="margin: 0 auto;">êtes vous bien sûr de vouloir supprimer l'article?</h3>
            <span style="font-size:30px;" id="closeBtn3">&times;</span>
            <button><a style="cursor:pointer;text-decoration:none;color:#fff;" href="../controllers/deleteCommentsController.php<?= '?id=' . $comments->id ?>">SUPPRIMER</a></button>
        </div>
    </div>
    </div>


</main>
