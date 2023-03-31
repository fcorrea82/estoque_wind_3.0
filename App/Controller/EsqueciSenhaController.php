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
}
