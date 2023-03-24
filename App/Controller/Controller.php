<?php
//Conceito de classe abstradas classe que nunca terá instancias.
namespace App\Controller;

abstract class Controller
{
    protected static function isProtected()
    {
        if (!isset($_SESSION["usuario_logado"]))
            header("Location: /login");
    }
}