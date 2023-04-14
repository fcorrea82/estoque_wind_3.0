<?php

class PinpadModel
{
    private $pdo;

    public function __construct()
    {
        //Conectar ao banco de dados
        $this->pdo = new PDO('mysql:host=localhost;dbname=estoque_novo', 'root', '');
    }

    public function listarPinpads()
    {
        //Consulta ao banco de dados
        $stmt = $this->pdo->query('SELECT * FROM Pinpad');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
