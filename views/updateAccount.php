<h1>Modifier mon compte</h1>
<?php if (isset($success['udpate'])) { ?>
    <p><?= $success['udpate'] ?></p>
<?php } ?>
<form action="/modifier-mon-compte" method="post">
    <label for="email">Adresse mail</label>
    <input type="email" name="email" id="email" placeholder="jean.dupont@gmail.com" value="<?= $userAccount->email ?>">
    <?php if (isset($errors['email'])) { ?>
        <p><?= $errors['email'] ?></p>
    <?php } ?>

    <label for="username">Nom d'utilisateur</label>
    <input type="text" name="username" id="username" placeholder="Jean Dupont" value="<?= $userAccount->username ?>">
    <?php if (isset($errors['username'])) { ?>
        <p><?= $errors['username'] ?></p>
    <?php } ?>

    <label for="birthdate">Date de naissance</label>
    <input type="date" name="birthdate" id="birthdate" value="<?= $userAccount->birthdate ?>">
    <?php if (isset($errors['birthdate'])) { ?>
        <p><?= $errors['birthdate'] ?></p>
    <?php } ?>

    <input type="submit" value="Modifier" name="updateInfos">
</form>

<form action="/modifier-mon-compte" method="POST">

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Azerty123!">
    <?php if (isset($errors['password'])) { ?>
        <p><?= $errors['password'] ?></p>
    <?php } ?>

    <label for="password_confirm">Confirmation du mot de passe</label>
    <input type="password" name="password_confirm" id="password_confirm" placeholder="Azerty123!">
    <?php if (isset($errors['password_confirm'])) { ?>
        <p><?= $errors['password_confirm'] ?></p>
    <?php } ?>
    <input type="submit" value="Modifier" name="updatePassword">

</form>

<button id="openModalBtn">Supprimer</button>

<div id="modalContainer">
    <div id="modal">
        <span id="closeBtn">&times;</span>
        <p id="modalText">Êtes-vous sûr de vouloir supprimer votre compte ?</p>
        <form action="/modifier-mon-compte" method="POST">
            <input type="submit" value="Supprimer" name="deleteAccount">
        </form>
    </div>
</div>