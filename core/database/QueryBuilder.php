<?php


class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function register($parameters) {
        $sql = sprintf(
            'INSERT INTO users (%s) VALUES (%s)',
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch(PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function auth($parameters) {
        $statement = $this->pdo->prepare("SELECT id, name , email FROM users WHERE email = :email AND password = :password LIMIT 1");

        try {
            $statement->execute($parameters);

            $user = $statement->fetch(PDO::FETCH_OBJ);

            return $user;
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $user;
    }

    public function searchUser($parameter) {
        $statement = $this->pdo->prepare("SELECT id, name, email FROM users WHERE name = :q OR email = :q");
        
        try {
            $statement->execute($parameter);

            $users = $statement->fetchAll(PDO::FETCH_OBJ);

            return $users;

        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}