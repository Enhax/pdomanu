<main class="container">
    <h1>Liste des articles</h1>
    <?php if(!empty($_SESSION['deleteArticle'])): ?>
        <?= $_SESSION['deleteArticle'] ?>
       <?php endif ?>

<div class="row">
    <?php
    foreach ($articles as $article) : ?>
        <div style="padding:30px;">
            <h2><?= $article->title ?></h2>
            <p><?= $article->content ?></p>
            <img src="<?= $article->image ?>"><br>
            <small><?= $article->publicationDate ?></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/seemore<?= '?id='. $article->id ?>">Voir</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/edit<?= '?id='. $article->id ?>">Modifier</a>
        </div>
    <?php endforeach ?>
    </div>

</main>