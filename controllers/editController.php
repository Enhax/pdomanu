<?php
session_start();
require '../credentials.php';
require '../models/articlesModel.php';
require '../models/categoriesModel.php';
require 'formValidation.php';

$category = new Categories;
$article = new Articles;
$success = [];
$errors = [];
$cat = $category->getList();


if(!empty($_GET['id'])){   
    $id = clean($_GET['id']);
    $id = (int)$id;
    $article->id = $id;
    $art = $article->displayOne();
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if(!empty($_POST['title'])){
        $article->title = clean($_POST['title']);

    } else{
        $errors['title'] = 'Veuillez remplir le champ';
    }

    if(!empty($_POST['content'])){
        $article->content = clean($_POST['content']);

    } else{
        $errors['content'] = 'Veuillez remplir le champ';
    }

    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['type'];
    if ($filetype == 'image/jpeg' || $filetype == 'image/png' || $filetype == 'image/gif') {
        move_uploaded_file($_FILES['image']['tmp_name'], '../files/'.$filename);
        $filepath = '../files/' . $filename;
        $article->image = $filepath;
    }

    if(!empty($_POST['categories'])){
        clean($_POST['categories']);
        $article->id_postsCategories = $_POST['categories'];
        $category->id = $article->id_postsCategories;    
    } else{
        $errors['categories'] = 'Choisissez une catégorie';
    }

    if(!empty($_POST['id'])){
        clean($_POST['id']);
        $article->id_users = $_POST['id'];
    }
    
    if(empty($errors)){
        $article->edit();
        $success['editArticle'] = 'L\'article a bien été modifié';
    } else{
        $error['editArticle'] = 'L\'article n\'a pas été modifié';
    }
}






require '../views/parts/header.php';
require '../views/edit.php';
require '../views/parts/footer.php';
