<?php

namespace App\DAO;

class UsuarioDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getById($id)
    {
        $stmt = $this->conexao->prepare("
            SELECT u.*, g.descricao AS grupo_descricao 
            FROM usuarios u 
            LEFT JOIN grupos g ON u.id_grupo = g.id 
            WHERE u.id = ?
        ");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }


    public function getAllRows()
    {
        $sql = "SELECT u.id, u.nome, u.email, u.id_grupo, u.usuario, g.descricao AS grupo 
                FROM usuarios u
                JOIN grupos g ON (g.id = u.id_grupo)";


        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    public function insert($dados)
    {
        $sql = "INSERT INTO usuarios (nome, email, usuario, id_grupo) VALUES (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados['nome']);
        $stmt->bindValue(2, $dados['email']);
        $stmt->bindValue(3, $dados['usuario']);
        $stmt->bindValue(4, $dados['id_grupo']);
        $stmt->execute();
    }

    public function update($dados_usuario)
    {

        $sql = "UPDATE usuarios SET nome=?, email=?, usuario=?, id_grupo=?, senha=sha1(?) WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados_usuario['nome']);
        $stmt->bindValue(2, $dados_usuario['email']);
        $stmt->bindValue(3, $dados_usuario['usuario']);
        $stmt->bindValue(4, $dados_usuario['id_grupo']);
        $stmt->bindValue(5, $dados_usuario['senha']);
        $stmt->bindValue(6, $dados_usuario['id']);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = ? ";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function getMyUserById($id)
    {
        $stmt = $this->conexao->prepare("SELECT id, nome, usuario, email FROM usuarios WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function checkUserByIdAndPassword($id, $senha)
    {
        $stmt = $this->conexao->prepare("SELECT id FROM usuarios WHERE id = ? AND senha = sha1(?)");
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $senha);
        $stmt->execute();
        return $stmt->fetchObject();
    }


    public function checkDuplicateEmail($email, $id_usuario)
    {
        $stmt = $this->conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $dados = $stmt->fetchObject();

        if (is_object($dados)) {
            if ($id_usuario == $dados->id)
                return false;
            else
                return true;
        } else
            return false;
    }


    public function checkDuplicateUsuario($usuario, $id_usuario)
    {
        $stmt = $this->conexao->prepare("SELECT id FROM usuarios WHERE usuario = ? ");
        $stmt->bindValue(1, $usuario);
        $stmt->execute();

        $dados = $stmt->fetchObject();

        if (is_object($dados)) {
            if ($id_usuario == $dados->id)
                return false;
            else
                return true;
        } else
            return false;
    }
}
