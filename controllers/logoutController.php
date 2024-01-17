<?php 
/**
 * Pour me déconnecter, je détruis ma session et je redirige l'utilisateur vers la page de connexion.
 * Je démarre la session pour pouvoir utiliser la variable $_SESSION
 * Je détruis ma variable $_SESSION avec unset($_SESSION)
 * Je détruis la session avec session_destroy()
 * Je redirige l'utilisateur vers la page de connexion avec header('Location: /connexion')
 * Je termine le script avec exit
 */
session_start();
unset($_SESSION);
session_destroy();
header('Location: /connexion');
exit;