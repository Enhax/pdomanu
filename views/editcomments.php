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
            <button type="submit" style="background-color:#09f;">Modifier</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button id="openModalBtn" style="cursor:pointer;text-decoration:none;color:#fff;background-color:#f00">Supprimer</button>
    </form>
    <div id="modalContainer">
        <div class="modal" id="modal">
            <h3 id="modalText" style="margin: 0 auto;">êtes vous bien sûr de vouloir supprimer l'article?</h3>
            <span style="font-size:30px;" id="closeBtn">&times;</span>
            <button><a style="cursor:pointer;text-decoration:none;color:#fff;" href="../controllers/deleteController.php<?= '?id=' . $comments->id ?>">SUPPRIMER</a></button>
        </div>
    </div>
    </div>

</main>