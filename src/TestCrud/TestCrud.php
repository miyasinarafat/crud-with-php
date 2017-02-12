<?php
namespace App\TestCrud;

use PDO;


class TestCrud
{
    public $fname;
    public $lname;
    public $conn;
    public $id;
    public $data;

    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=TestCrud', 'root', '');
    }

    public function prepare($data)
    {
        if (!empty($data['id'])) {
            $this->id = $data['id'];
        }
        if (!empty($data['fname'])) {
            $this->fname = $data['fname'];
        }
        if (!empty($data['lname'])) {
            $this->lname = $data['lname'];
        }
    }

    public function store()
    {
        try {
            $stmt = $this->conn->prepare('INSERT INTO TestCrud VALUES(:id,:fname,:lname)');
            $stmt->execute(array(
                ':id' => null,
                ':fname' => $this->fname,
                ':lname' => $this->lname,
            ));

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function index()
    {
        try {
            $query = 'SELECT * FROM TestCrud';
            $result = $this->conn->prepare($query);
            $result->execute();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $this->data[] = $row;
            }
            return $this->data;

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function show()
    {
        try {
            $query = "SELECT * FROM TestCrud WHERE id=" . "'" . $this->id . "'";
            $result = $this->conn->prepare($query);
            $result->execute();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                return $row;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update()
    {
        try {
            $query = "UPDATE TestCrud SET fname = :fname, lname = :lname WHERE id=" . "'" . $this->id . "'";
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array(
                ':fname' => $this->fname,
                ':lname' => $this->lname,
            ));
            header('location:index.php');
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            $query = "DELETE FROM TestCrud WHERE id=" . "'" . $this->id . "'";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            header('location:index.php');
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}