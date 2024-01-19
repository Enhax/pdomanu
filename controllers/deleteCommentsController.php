<?php
session_start();
require_once '../credentials.php';
require_once '../models/commentsModel.php';

$comments = new Comments;

if (!empty($_GET['id'])) {
    $id = clean($_GET['id']);
    $id = (int)$id;
    $comments->id = $_SESSION['comments']['id'];
    $comments->deleteComments();
    header('Location: /blog');
    $success['deletecomment'] = 'Le commentaire a bien bien été supprimé';
}
