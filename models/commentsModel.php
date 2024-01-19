<?php

class Comments
{
    private $pdo;
    public int $id;
    public string $content;

    public int $id_posts;

    public int $id_users;


    public function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname=corrections_pdo_la-manu-post;charset=utf8', DB_USER, DB_PASSWORD);
        }
        catch(PDOException $e){
            echo 'Erreur: ' . $e->getMessage();
        }  
    }

    public function create()
    {
        $sql = 'INSERT INTO `pab7o_comments` (`content`, `publicationDate`, `id_posts`, `id_users`)
        VALUES (:content, NOW(), :id_posts, :id_users)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id_posts', $this->id_posts, PDO::PARAM_INT);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $req->execute();
    }

    public function displayOneComment()
    {
        $sql = 'SELECT `id`, `content`, DATE_FORMAT(`publicationDate`,"Le %d/%m/%Y à %Hh%i") as `publicationDateFr`, `id_posts`, `id_users` FROM `pab7o_comments` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function displayComments(){
        $sql = 'SELECT `pab7o_comments`.`id`, `content`, DATE_FORMAT(`publicationDate`,"Le %d/%m/%Y à %Hh%i") as `publicationDateFr`, `pab7o_users`.`username` as `username`, `pab7o_comments`.`id_users`
        FROM `pab7o_comments` JOIN `pab7o_users`
        ON `pab7o_comments`.`id_users` = `pab7o_users`.`id`
        WHERE `pab7o_comments`.`id_posts` = :id_posts
        ORDER BY `publicationDate` DESC';       
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id_posts', $this->id_posts, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function editComments()
    {
        $sql = 'UPDATE `pab7o_comments` SET `content`=:content WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function deleteComments()
        {
            $sql = 'DELETE FROM `pab7o_comments` WHERE `id` = :id';
            $req = $this->pdo->prepare($sql);
            $req->bindValue(':id', $this->id, PDO::PARAM_INT);
            return $req->execute();
        }

}