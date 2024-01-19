<?php
session_start();
var_dump($_POST);
require_once '../models/articlesModel.php';
require_once '../models/commentsModel.php';
require_once '../models/usersModel.php';
require_once 'formValidation.php';

$article = new Articles;
$comments = new Comments;
$user = new Users;

if(!empty($_POST['deletearticle']))
{
    $article->id = $_POST['deletearticle'];
    $article->delete();
    var_dump($article);
    header('Location: /blog');
}

if(!empty($_POST['deletecomment']))
{
    $comments->id = $_POST['deletecomment'];
    $comments->deleteComments();
}

if (!empty($_GET['id'])) {
    (int)$id = clean($_GET['id']);

    $article->id = $id;
    $user->id = $_SESSION['user']['id'];

    $art = $article->displayOne();
    $comments->id_posts = $id;

    $coms = $comments->displayComments();
}

if (isset($_POST['addComment'])) {
    if (!empty($_POST['comment'])) {
        $comments->content = clean($_POST['comment']);
        $comments->id_users = $_SESSION['user']['id'];
        $comments->id_posts = $article->id;
        if (empty($errors)) {
            $comment = $comments->create();           
        } else {
            $errors['comment'] = 'Un problème est survenue, veuillez recommencer';
        }
    }
}



require_once '../views/parts/header.php';
require_once '../views/seemore.php';
require_once '../views/parts/footer.php';
