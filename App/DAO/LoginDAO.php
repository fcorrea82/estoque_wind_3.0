<?php

namespace App\DAO;

class LoginDAO extends DAO
{

    /**
     * construtor chamando o construtor da classe DAO.php
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function setNewPassWordForUserByEmail($email, $newpassword)
    {

        $sql = "UPDATE usuario SET senha=sha1(?) WHERE email=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $newpassword);
        $stmt->bindValue(2, $email);
        $stmt->execute();
    }

    public function getUserByUserAndPass($usuario, $senha)
    {
        $sql = "SELECT id, nome FROM usuario WHERE usuario=? AND senha= sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $usuario);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject();
    }
}
