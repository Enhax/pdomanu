<?php
session_start();
require_once '../credentials.php';
require_once '../models/articlesModel.php';

$article = new Articles;


if (!empty($_GET['id'])) {
    $id = clean($_GET['id']);
    $id = (int)$id;
    $article->id = $id;
    $article->delete();
    header('Location: /blog');
    $_SESSION['deleteArticle'] = 'L\'article a bien été supprimé';
}
