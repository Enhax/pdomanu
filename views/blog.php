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
            <p class="artest"><?= $article->content ?></p>
            <img src="<?= $article->image ?>"><br>
            <small><?= $article->publicationDate ?></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/seemore<?= '?id='. $article->id ?>">Voir</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php if (!empty($_SESSION['user']) && $article->id_users == $_SESSION['user']['id']) : ?>
            <a href="/edit<?= '?id='. $article->id ?>">Modifier</a>
            <?php endif ?>
        </div>
    <?php endforeach ?>
    </div>

</main>