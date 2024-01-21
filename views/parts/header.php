<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <script src="https://cdn.tiny.cloud/1/akyczp5d9dn0xe1rj5vunh4311ayl8w8k4g0mptuxzb7n6em/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '.mytextarea'
      });
    </script>
</head>

<body>
    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/inscription">Inscription</a></li>
            <li><a href="/add">Ajouter un article</a></li>
            <?php if (!empty($_SESSION) && $_SESSION['user']['id_usersRoles'] == 258) : ?>
            
            <?php endif ?>
            <?php if (empty($_SESSION['user'])) { ?>
                <li><a href="/connexion">Connexion</a></li>
            <?php } else { ?>
                <li><a href="/mon-compte"><?= $_SESSION['user']['username'] ?></a></li>
                <?php if ($_SESSION['user']['id_usersRoles'] == 258) { ?>
                    <li><a href="/dashboard">Admin</a></li>
                <?php } ?>
                <li><a href="/deconnexion">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
    <main>