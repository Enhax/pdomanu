<?php 
session_start();

require_once 'views/parts/header.php'; 
?>

<?php if(isset($_GET['deleteAccount'])) { ?>
    <p>Votre compte a bien été supprimé.</p>
<?php } ?>
<section class="pageIntroduction">
    <h1>La Manu Post</h1>
    <p class="subTitle">Démo inscription - connexion - PDO</p>

    <p>
        Dans ce projet, nous allons faire la démonstration pas à pas d'un projet MVC avec du PDO.
    </p>
</section>

<section>
    <h2>MVC</h2>
    <p>
        Le MVC (Modèle - Vue - Contrôleur) est une architecture d'application. C'est une manière d'organiser son code. Elle n'est pas obligatoire mais permet de simplifier et optimiser les gros projets. C'est l'architecture la plus utilisée dans les frameworks PHP (Symfony, Laravel, etc.). Ce n'est pas la seule qui existe, il existe aussi le HMVC (Hierarchical Model View Controller) qui est une évolution du MVC, le MVVM (Model View ViewModel) qui est utilisé dans les applications mobiles, etc.
    </p>
    <p>
        Le MVC est composé de 3 parties :
    </p>
    <ul>
        <li>Le modèle : c'est la partie qui gère les données. C'est ici que l'on va faire les requêtes SQL</li>
        <li>La vue : c'est la partie qui gère l'affichage. C'est ici que l'on va faire le HTML, lier le CSS, le JS, etc.</li>
        <li>Le contrôleur : c'est la partie qui gère la logique. C'est ici que l'on va faire les conditions, les boucles, etc.</li>
    </ul>
    <p>
        Le MVC est une architecture qui est basée sur le principe de séparation des préoccupations (SoC : Separation of Concerns). C'est à dire que chaque partie a un rôle bien défini et ne doit pas faire le travail des autres. Par exemple, le modèle ne doit pas faire d'affichage, la vue ne doit pas faire de requêtes SQL, etc.
    </p>
    <p>
        A la racine du projet, nous avons 3 dossiers :
    </p>   
    <ul>
        <li>Le dossier <code>controllers</code></li>
        <li>Le dossier <code>models</code></li>
        <li>Le dossier <code>views</code></li>
    </ul>

    <p>
        Chacun des dossiers peuvent être divisés en d'autres dossiers, selon votre organisation. Par exemple, dans le dossier <code>views</code>, nous avons un dossier <code>parts</code> qui contient les parties communes à toutes les pages (header, footer, etc.).
    </p>
</section>

<section>
    <h2>PDO</h2>
    <p>
        PDO (PHP Data Object) est une extension PHP qui permet de se connecter à une base de données. C'est une extension qui est plus récente que <code>mysqli</code> et qui est plus sécurisée. Elle permet de se connecter à plusieurs types de bases de données (MySQL, PostgreSQL, SQLite, etc.). Elle permet aussi de faire des requêtes préparées, ce qui permet de se protéger des injections SQL.
    </p>
    <p>
        Cette section sera complétée au moment de la démonstration de PDO.
    </p>
</section>

<?php require_once 'views/parts/footer.php'; ?>