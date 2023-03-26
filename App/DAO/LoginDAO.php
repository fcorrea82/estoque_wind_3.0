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
        //  $sql = "SELECT id, nome FROM usuario WHERE usuario=? AND senha= sha1(?) ";
        $sql = "SELECT u.id, u.nome, u.id_grupo, g.descricao AS grupo, g.cadastrar, g.editar, g.listar, g.excluir
                FROM usuario u
                JOIN grupos g ON (g.id = u.id_grupo)
                WHERE u.usuario=? AND u.senha= sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $usuario);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        $dados_usuario = $stmt->fetchObject();

        /* if (is_object($dados_usuario))
            $dados_usuario->permissoes_grupo = $this->getGroupPermissonsById($dados_usuario->id_grupo);*/

        //  return $stmt->fetchObject();

        return $dados_usuario;
    }

    /*
    private function getGroupPermissonsById($id)
    {
        $sql = "SELECT cadastrar, editar, listar, excluir
                FROM grupos_permissoes gp
                WHERE gp.id_grupo=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }*/
}
