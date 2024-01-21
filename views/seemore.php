<main class="container">

    <div class="article" style="display:flex">
        <div style="padding-right:100px;">
            <h1><?= $art->title ?></h1>
            <p style="padding-right:20%;"><?= $art->content ?></p>
            <small><?= $art->publicationDate ?></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button style="background-color:#0f0;"><a style="cursor:pointer;text-decoration:none;color:#fff;" href="/blog">Retour</a></button>&nbsp;&nbsp;&nbsp;
            <?php if ($art->id_users == $_SESSION['user']['id']) : ?>
                <button style="background-color:#09f;"><a style="cursor:pointer;text-decoration:none;color:#fff;" href="/edit<?= '?id=' . $id ?>">Modifier</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="openModalBtn" delete="article-<?= $article->id ?>" style="cursor:pointer;text-decoration:none;color:#fff;background-color:#f00">Supprimer</button>
            <?php endif ?>
        </div>
        <div>
            <img style="width:400px;height:500px;aspect-ratio:16/9;" src="<?= $art->image ?>">
        </div>
    </div>

    <div class="comments">
        <div class="comment" style="margin-top:30px;">
            <label style="margin-top:10px;">Nouveau commentaire</label>
            <form method="POST">
                <textarea class="mytextarea" name="comment" placeholder="Qu'en penses-tu <?= $_SESSION['user']['username'] ?>?" rows="10" style="width:800px;resize:none;padding:10px;" value="<?php if (!empty($comments->content)) : ?><?= $comments->content ?><?php endif ?>"></textarea>
                <button type="submit" name="addComment" style="cursor:pointer;">Envoyer</button>
            </form>
            <?php if (!empty($success['deletecomment'])) : ?>
                <?= $success['deletecomment'] ?>
            <?php endif ?>
            <?php if (!empty($errors['deletecomment'])) : ?>
                <?= $errors['deletecomment'] ?>
            <?php endif ?>
            <div id="modalContainer">
                <div class="modal" id="modal">
                    <h3 id="modalText" style="margin: 0 auto;">êtes vous bien sûr de vouloir supprimer <span id="elementToDelete"></span>?</h3>
                    <span style="font-size:30px;" id="closeBtn">&times;</span>
                    <form action="#" method="POST">
                        <input type="hidden" id="deleteInput">
                        <button type="submit">SUPPRIMER</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="comment">
            <?php foreach ($coms as $c) : ?>
                <h3><?= $c->username ?></h3>
                <small><?= $c->publicationDateFr ?></small>
                <p><?= $c->content ?></p><br>

                <?php if ($c->id_users == $_SESSION['user']['id']) : ?>
                    <button style="background-color:#09f;"><a style="cursor:pointer;text-decoration:none;color:#fff;" href="/editcomments<?= '?id=' . $c->id ?>">Modifier</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="openModalBtn" delete="comment-<?= $c->id ?>" style="cursor:pointer;text-decoration:none;color:#fff;background-color:#f00">Supprimer</button>
                <?php endif ?>
            <?php endforeach ?>

        </div>

    </div>

</main>