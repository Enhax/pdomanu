<main class="container">
    <h2>Modifier le commentaire</h2>
    <?php if (!empty($_SESSION['deleteComments'])) : ?>
        <?= $_SESSION['deleteComments'] ?>
    <?php endif ?>
    
    <form method="POST">

        <div class="form-add">
            <div>
                <label>Content</label>
                <textarea class="mytextarea" name="content"><?= $coms->content ?></textarea>
                <?php if (!empty($errors['content'])) : ?>
                    <?= $errors['content'] ?>
                <?php endif ?>
            </div>

            <div>
                <input type="hidden" name="id" value="<?= $comments->id ?>">
            </div>
            <button style="background-color:#0f0;"><a style="cursor:pointer;text-decoration:none;color:#fff;" href="/seemore <?= '?id=' . $coms->id_posts ?> ">Retour</a></button>&nbsp;&nbsp;&nbsp;
            <button type="submit" name="modify" style="background-color:#09f;cursor:pointer;">Modifier</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button id="openModalBtn" delete="comment-<?= $comments->id ?>" style="cursor:pointer;text-decoration:none;color:#fff;background-color:#f00">Supprimer</button><br><br>
        </div>

        <?php if (!empty($success['editcomments'])) : ?>
            <?= $success['editcomments'] ?>
        <?php endif ?>
        <?php if (!empty($errors['editcomments'])) : ?>
            <?= $errors['editcomments'] ?>
        <?php endif ?>

    </form>
    <div id="modalContainer">
        <div class="modal" id="modal">
            <h3 id="modalText" style="margin: 0 auto;">Êtes vous bien sûr de vouloir supprimer <span id="elementToDelete"></span></h3>
            <span style="font-size:30px;" id="closeBtn">&times;</span>
            <form action="#" method="POST">
                <input type="hidden" id="deleteInput">
                <button type="submit">SUPPRIMER</button>
            </form>
        </div>
    </div>
</main>