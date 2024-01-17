<?php
require_once '../credentials.php';

class Categories
{
    private $pdo;
    public int $id;
    public string $name;

    public function __construct()
    {
        try {

            $this->pdo = new PDO("mysql:host=localhost;dbname=corrections_pdo_la-manu-post;charset=utf8", DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function getList(){
        $sql = 'SELECT * FROM `pab7o_articlescategories`';
        $req = $this->pdo->query($sql);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}
