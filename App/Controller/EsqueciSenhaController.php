<?php

namespace App\Controller;

use App\DAO\UsuarioDAO;

class EsqueciSenhaController
{
    public function __construct()
    {
    }

    public function index()
    {
        //  require_once 'views/esqueci_minha_senha.php';
        require_once 'views/esqueci-senha.php';
    }

    public function enviarEmailResetSenha()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $mensagem = 'E-mail inválido!';
            //   require_once 'views/esqueci_minha_senha.php';
            require_once 'views/esqueci-senha.php';
            return;
        }

        $dao = new UsuarioDAO();
        $usuario = $dao->getByEmail($email);
        if (!$usuario) {
            $mensagem = 'E-mail não encontrado!';
            require_once 'views/esqueci-senha.php';
            return;
        }

        // Gera um token aleatório para o reset de senha
        $token = bin2hex(random_bytes(16));

        // Atualiza o token de reset de senha na base de dados
        $dao->updateResetSenhaToken($usuario->id, $token);

        // Envia um e-mail com o link para reset de senha
        $urlResetSenha = 'http://192.168.15.12/reset_senha.php?token=' . $token;
        $mensagem = "Enviamos um e-mail para o endereço $email com o link para reset de senha.";
        // Aqui seria o código para enviar o e-mail...

        require_once 'views/esqueci-senha.php';
    }
}
