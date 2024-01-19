<?php
session_start();
require_once '../models/articlesModel.php';
require_once '../models/categoriesModel.php';
require_once '../credentials.php';

$article = new Articles;
$category = new Categories;
$articles = $article->displayAll();
require_once '../views/parts/header.php';
require_once '../views/blog.php';
require_once '../views/parts/footer.php';


























