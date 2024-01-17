<main class="container">

    <div class="article" style="display:flex">
        <div style="padding-right:100px;">
            <h1><?= $art->title ?></h1>
            <p style="padding-right:20%;"><?= $art->content ?></p>
            <small><?= $art->publicationDate ?></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button style="background-color:#0f0;"><a style="cursor:pointer;text-decoration:none;color:#fff;" href="/blog">Retour</a></button>&nbsp;&nbsp;&nbsp;
            <button style="background-color:#09f;"><a style="cursor:pointer;text-decoration:none;color:#fff;" href="/edit<?= '?id=' . $id ?>">Modifier</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button id="openModalBtn" style="cursor:pointer;text-decoration:none;color:#fff;background-color:#f00">Supprimer</button>
        </div>
        <div>
            <img style="width:400px;height:500px;aspect-ratio:16/9;" src="<?= $art->image ?>">
        </div>
    </div>
    <hr>
    <div class="comments">
        <div class="comment" style="margin-top:30px;">
            <label style="margin-top:10px;">Nouveau commentaire</label>
            <form method="POST">
                <textarea name="comment" placeholder="Qu'en penses-tu <?= $_SESSION['user']['username'] ?>?" rows="10" style="width:800px;resize:none;padding:10px;" value="<?php if (!empty($comments->content)) : ?><?= $comments->content ?><?php endif ?>"></textarea>
                <button type="submit" style="cursor:pointer;">Envoyer</button>
            </form>
            <div id="modalContainer">
                <div class="modal" id="modal">
                    <h3 id="modalText" style="margin: 0 auto;">êtes vous bien sûr de vouloir supprimer l'article?</h3>
                    <span style="font-size:30px;" id="closeBtn">&times;</span>
                    <button><a style="cursor:pointer;text-decoration:none;color:#fff;" href="../controllers/deleteController.php<?= '?id=' . $article->id ?>">SUPPRIMER</a></button>
                </div>
            </div>
        </div>
        <div class="comment">
            <?php foreach ($coms as $c) : ?>
                <h3><?= $c->username ?></h3>
                <small><?= $c->publicationDateFr ?></small>
                <p><?= $c->content ?></p><br>
                <button style="background-color:#09f;"><a style="cursor:pointer;text-decoration:none;color:#fff;" href="/editcomments<?= '?id=' . $c->id ?>">Modifier</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="openModalBtns" style="cursor:pointer;text-decoration:none;color:#fff;background-color:#f00">Supprimer</button>
               
            <?php endforeach ?>
            <div class="modalContainers containers">
                    <div class="modal2">
                        <h3 class="modalText2" style="margin: 0 auto;">êtes vous bien sûr de vouloir supprimer le commentaire?</h3>
                        <span style="font-size:30px;" class="closeBtns">&times;</span>
                        <button><a style="cursor:pointer;text-decoration:none;color:#fff;" href="../controllers/deleteCommentsController.php<?= '?id=' . $c->id ?>">SUPPRIMER</a></button>
                    </div>
                </div>
        </div>

    </div>

</main>