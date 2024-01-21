<?php
session_start();
require '../credentials.php';
require '../models/commentsModel.php';
require '../models/articlesModel.php';
require 'formValidation.php';

$comments = new Comments;
$articles = new Articles;
$article = $articles->displayAll();

if(!empty($_GET['id'])){   
    $id = clean($_GET['id']);
    $id = (int)$id;
    $comments->id = $id;
    $coms = $comments->displayOneComment();
}

if(isset($_POST['modify'])){

    if(!empty($_POST['content'])){
        $comments->content = trim($_POST['content']);
    }
  
    if(empty($errors)){
        $comments->editComments();
        $success['editcomments'] = 'Le commentaire a bien été modifié';
        
    } else{
        $error['editcomments'] = 'Le commentaire n\'a pas été modifié';
    }   
}


require '../views/parts/header.php';
require '../views/editComments.php';
require '../views/parts/footer.php';
