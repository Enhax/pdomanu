<?php
class Articles
{

    private $pdo;
    public int $id;
    public string $title;
    public string $content;

    public string $image;

    public string $publicationDate;
    public string $updateDate;
    public string $createdAt;
    public int $id_users;
    public int $id_postsCategories;

    public function __construct()
    {
        try {

            $this->pdo = new PDO("mysql:host=localhost;dbname=corrections_pdo_la-manu-post;charset=utf8", DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function displayAll()
    {
        $sql = 'SELECT `id`, `title`, `content`, DATE_FORMAT(`publicationDate`,"Le %d/%m/%Y à %Hh%i") as `publicationDate`,`image`, `id_postsCategories` FROM `pab7o_articles`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function displayOne()
    {
        $sql = 'SELECT `title`, `content`, DATE_FORMAT(`publicationDate`,"Le %d/%m/%Y à %Hh%i") as `publicationDate`, `updateDate`, `image`, `id_postsCategories` FROM `pab7o_articles` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }

    public function create()
    {

        $sql = 'INSERT INTO `pab7o_articles` (`title`, `content`, `publicationDate`, `updateDate`, `image`, `id_users`, `id_postsCategories`)
        VALUES (:title, :content,  NOW(), NOW(), :image, :id_users, :id_postsCategories)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':title', $this->title, PDO::PARAM_STR);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':image', $this->image, PDO::PARAM_STR);
        $req->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $req->bindValue(':id_postsCategories', $this->id_postsCategories, PDO::PARAM_INT);
        return $req->execute();
    }
    public function edit()
    {
        $sql = 'UPDATE `pab7o_articles` SET `title`=:title, `content`=:content, `updateDate`= NOW(),
         `image`=:image, `id_postsCategories`=:id_postsCategories
        WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':title', $this->title, PDO::PARAM_STR);
        $req->bindValue(':content', $this->content, PDO::PARAM_STR);
        $req->bindValue(':image', $this->image, PDO::PARAM_STR);
        $req->bindValue(':id_postsCategories', $this->id_postsCategories, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function delete()
    {
        $sql = 'DELETE FROM `pab7o_articles` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}
