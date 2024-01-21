<?php
require '../credentials.php';
/**
 ** Le modèle
 * Ici, nous sommes dans le modèle Users. Il n'est pas forcément une classe, ici nous créons une classe pour gérer notre projet en mode POO (Programmation Orientée Objet) donc avec des objets.
 * Le rôle du modèle est de faire des requêtes SQL et de renvoyer les résultats. Il ne doit pas y avoir de HTML dans le modèle.
 ** La classe
 *! Users est une classe pas un objet
 * Un objet est une instanciation de cette classe (voir le contrôleur)
 * Une classe contient 2 types d'éléments :
 *      - des attributs (des variables rattachées à la classe)
 *      - des méthodes (des fonctions rattachées à la classe)
 * Ils fonctionnent exactement comme des variables et des fonctions classiques, ils sont justes dépendants de l'objet ou de la classe.
 */
class Users
{
    /**
     * Les attributs et les méthodes sont toujours précédés d'une visibilité :
     *     - public : la méthode ou l'attribut peut être appelé en dehors de la classe (comme par exemple dans le contrôleur)
     *     - protected : la méthode ou l'attribut ne peut être utilisé que dans la classe ou dans une classe qui en hérité (exemple class Clients extends Users)
     *     - private : la méthode ou la classe ne peut être utilisé que dans la classe
     *
     * Ici, j'ai défini pdo en privé par que je n'en ai pas utilité en dehors de la classe car elle va contenir la connexion à la base de données.
     */
    private $pdo;
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public string $birthdate;
    public string $registerDate;
    public int $id_usersRoles;

    /**
     * Le constructeur de la classe. Il est appelé automatiquement lorsqu'on instancie la classe (ex : $user = new Users();)
     * Il permet de lancer une action automatiquement lorsqu'on instancie la classe. Ici, on va se connecter à la base de données. Comme ça, nous n'aurons pas à appeler une méthode supplémentaire pour nous connecter à la base de données.
     */
    public function __construct()
    {
        // J'utilise un bloc try/catch pour gérer les erreurs de connexion à la base de données, si une erreur de type PDOException est levée, je redirige l'utilisateur vers la page d'accueil (nous le renverrons vers une page d'erreur plus tard)
        // Attention, le try catch ne fonctionne pas comme un if/else. Si vous passez dans le try et qu'une erreur est levée, vous passerez dans le catch.
        try {
            /**
             * Pour me connecter à la base de données, j'instancie un objet de type PDO. 
             * Ici, vous remarquerez que l'instanciation (le new PDO) prend des paramètres. C'est parce que le constructeur de la classe PDO prend des paramètres.
             * Il prend 3 paramètres :
             *     - le premier est la phrase de connexion : mysql:host=localhost;dbname=corrections_pdo_la-manu-post
             *         - le premier morceau (mysql) est le SGBD utilisé
             *         - le deuxième (host=localhost) est le nom de l'hôte (ici, nous sommes en local, donc c'est localhost sinon c'est l'adresse IP ou le nom de domaine de votre serveur)
             *        - le troisième (dbname=corrections_pdo_la-manu-post) est le nom de la base de données
             *    - le deuxième est le nom d'utilisateur de la base de données : lk85m_admin
             *   - le troisième est le mot de passe de la base de données : RFjM6KaM$fDaqX9M
             */
            $this->pdo = new PDO('mysql:host=localhost;dbname=corrections_pdo_la-manu-post;charset=utf8', DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            // Si la connexion à échouée, je redirige l'utilisateur vers la page d'accueil (nous le renverrons vers une page d'erreur plus tard)
            header('Location: /erreur-connexion');
            exit();
        }
    }

    //Dans la méthode (= fonction mais rattachée à une classe) suivante, nous sélectionnons un élement grâce à une infomation extérieure. Vous pouvez vous en servir de modèle pour récupérer le profil d'un utilisateur, afficher un article par son id, etc.

    /**
     * Vérifie si un utilisateur existe dans la base de données avec l'email
     * @param string $email L'adresse email
     * @return bool
     */
    public function checkIfExistsByEmail()
    {
        // Je prépare ma requête SQL, je l'ai préalalement écrite dans phpMyAdmin pour vérifier qu'elle fonctionne. J'y remplace l'élément qui va varier par un marqueur nominatif (ici :email qui changera selon la personne qui se connecte)
        $sql = 'SELECT COUNT(`email`) FROM `pab7o_users` WHERE `email` = :email';
        // Un marqueur nominatif est une information manquante, donc la requête ne peut pas être exécutée telle quelle. Il faut donc la préparer. C'est ce que je fais avec la ligne suivante. Je prépare ma requête SQL et je la stocke dans une variable $req (pour request). Je peux mettre ma requête directement dans les parenthèses mais j'ai préféré la stocker dans une variable pour plus de lisibilité.
        $req = $this->pdo->prepare($sql);
        // Une fois que ma requête est préparée, je peux lui passer les valeurs des marqueurs nominatifs. Ici, je lui passe la valeur de :email qui est l'email de l'utilisateur qui tente de se connecter. Le modèle sait quel email prendre parce que j'appelle $this->email qui est rélié au $user->email du contrôleur parce que j'ai appelé $user->email et $user->checkIfExistsByEmail avec le même objet $user.
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        // Une fois que j'ai passé toutes les valeurs des marqueurs nominatifs, je peux exécuter ma requête SQL avec la méthode execute() si cette étape n'est pas faite, rien ne se passera dans la base de données.
        $req->execute();
        /**
         * Si ma requête SQL est un select, je dois récupérer le résultat pour ça je dois utiliser les méthodes fetch ou fetchAll (que l'on verra dans une autre méthode). On peut y préciser sous quelle forme récupérer nos informations : 
         * - FETCH_ASSOC permet de récupérer sous forme de tableau associatif ($tableau['nomDeLaColonneDansLaBDD] - voir la méthode getInfosByEmail()
         * - FETCH_OBJ permet de récupérer sous forme d'objet ($objet->nomDeLaColonneDansLaBDD)
         * - FETCH_COLUMN permet de récupérer sous forme de string
         * 
         * Ici, j'ai fait mon choix en fonction de ce que j'ai voulu récupérer. Je ne vais récupérer qu'un chiffre (1 ou 0), je n'ai donc pas besoin de récupérer un tableau ou un objet. Je récupère donc un string.
         *  */

        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Vérifie si un utilisateur existe dans la base de données avec le nom d'utilisateur
     * @param string $username Le nom d'utilisateur
     * @return bool
     */
    public function checkIfExistsByUsername()
    {
        $sql = 'SELECT COUNT(`username`) FROM `pab7o_users` WHERE `username` = :username';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Ajoute un utilisateur dans la base de données
     * @param string $username Le nom d'utilisateur
     * @param string $email L'adresse email
     * @param string $password Le mot de passe hashé
     * @param string $birthdate La date de naissance au format YYYY-MM-DD
     * @return bool
     */
    public function create()
    {
        $sql = 'INSERT INTO `pab7o_users` (`username`,`email`,`password`,`birthdate`,`registerDate`,`id_usersRoles`) 
        VALUES (:username,:email,:password,:birthdate, NOW(), 1)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        return $req->execute();
    }

    /**
     * Supprime un utilisateur selon son id
     * @param int $id L'id de l'utilisateur à supprimer
     * @return bool
     */
    public function delete()
    {
        $sql =  'DELETE FROM `pab7o_users` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }


    /**
     * Récupère les informations d'un utilisateur dans la base de données avec son adresse email
     * @param string $email L'adresse email de l'utilisateur qui nous permettra de récupérer ses informations
     * @return array Les informations de l'utilisateur
     */
    public function getInfosByEmail()
    {
        $sql = 'SELECT `id`, `username`, `email`, `id_usersRoles` FROM `pab7o_users` WHERE `email` = :email';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère les informations d'un utilisateur dans la base de données avec son id
     * @param int $id L'id de l'utilisateur qui nous permettra de récupérer ses informations
     * @return object Les informations de l'utilisateur
     */
    public function getById()
    {
        $sql = 'SELECT `username`,`email`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthdateFr`, `birthdate`,`registerDate`, `name` AS `roleName`
        FROM `pab7o_users`
        INNER JOIN `pab7o_usersroles` ON `id_usersRoles` = `pab7o_usersroles`.`id`
        WHERE`pab7o_users`.`id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Récupère le mot de passe hashé d'un utilisateur dans la base de données. 
     * On l'utilisera pour vérifier avec la fonction password_verify que le mot de passe saisi par l'utilisateur correspond bien à celui stocké dans la base de données.
     * @param string $email L'adresse email de l'utilisateur qui nous permettra de récupérer son mot de passe
     * @return string Le mot de passe hashé
     */
    public function getPassword()
    {
        $sql = 'SELECT `password` FROM `pab7o_users` WHERE `email` = :email';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Met à jour le nom de l'utilisateur, l'adresse email et la date de naissance
     * @param string $username Le nom de l'utilisateur
     * @param string $email L'adresse email de l'utilisateur
     * @param string $birthdate La date de naissance de l'utilisateur
     * @param int $id L'id de l'utilisateur à modifier
     * @return bool
     */
    public function update()
    {
        $sql = 'UPDATE `pab7o_users` SET `username` = :username, `email` = :email, `birthdate` = :birthdate WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':username', $this->username, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    /**
     * Met à jour le mot de passe de l'utilisateur
     * @param string $password Le mot de passe de l'utilisateur
     * @param int $id L'id de l'utilisateur à modifier
     * @return bool
     */
    public function updatePassword()
    {
        $sql = 'UPDATE `pab7o_users` SET `password` = :password WHERE `id`= :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}
