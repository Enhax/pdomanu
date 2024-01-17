<?php
require_once '../models/usersModel.php';

session_start();

if(empty($_SESSION['user'])){
    header('Location: /connexion');
    exit;
}

$user = new Users;
$user->id = $_SESSION['user']['id'];
$userAccount = $user->getById();

require_once '../views/parts/header.php';
require_once '../views/account.php';
require_once '../views/parts/footer.php';