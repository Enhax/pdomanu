<?php
session_start();
require '../credentials.php';
require '../models/categoriesModel.php';
require '../models/articlesModel.php';
require_once 'formValidation.php';

$categories = new Categories;
$article = new Articles;
$success = [];
$category = $categories->getList();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['title'])) {
        $article->title = clean($_POST['title']);
    } else {
        $errors['title'] = 'Vous devez remplir ce champ';
    }

    if (!empty($_POST['content'])) {
        $article->content = clean($_POST['content']);
    } else {
        $errors['content'] = 'Vous devez remplir ce champ';
    }

    $filename = $_FILES['image']['name'];
    $filetype = $_FILES['image']['type'];
    if ($filetype == 'image/jpeg' || $filetype == 'image/png' || $filetype == 'image/gif') {
        move_uploaded_file($_FILES['image']['tmp_name'], '../files/'.$filename);
        $filepath = '../files/' . $filename;
        $article->image = $filepath;
    }

    if(!empty($_POST['category'])){
        clean($_POST['category']);
        $categories->id = $_POST['category'];
        $article->id_postsCategories = $categories->id;
    } else{
        $errors['category'] = 'Choisissez une catégorie';
    }

    if(!empty($_POST['id'])){
        $article->id_users = $_POST['id'];
    }
    
    if(empty($errors)){
        $article->create();
        $success['addArticle'] = 'L\'article a bien été créé';
    } else{
        $error['addArticle'] = 'L\'article n\'a pas été créé';
    }
    
}


















require '../views/parts/header.php';
require '../views/addArticle.php';
require '../views/parts/footer.php';
