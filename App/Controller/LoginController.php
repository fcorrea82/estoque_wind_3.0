<?php


namespace App\Controller;

use App\DAO\LoginDAO;
use Exception;

class LoginController extends Controller
{

    public static function login()
    {
        include PATH_VIEW . 'login.php';
    }

    public static function esqueciSenha()
    {
        include PATH_VIEW . 'esqueci-senha.php';
    }

    public static function enviarNovaSenha()
    {
        try {

            $nova_senha = uniqid();
            $email = $_POST['email'];

            $login_dao = new LoginDAO();
            $login_dao->setNewPassWordForUserByEmail($email, $nova_senha);

            $assunto = "Nova Senha do Sistema";
            $mensagem = "Sua nova senha é: " . $nova_senha;

            $retorno = "Caso seu email esteja em nosso sistema, você acaba de receber uma nova senha.";

            if (!mail($email, $assunto, $mensagem)) {

                $teste = "Senha gerada: " . $nova_senha;
                throw new Exception("Desculpe, ocorreu um erro ao enviar o email. </br> " . $teste);
            }
        } catch (Exception $e) {

            $retorno = $e->getMessage();
        }

        include PATH_VIEW . "esqueci-senha.php";
    }

    public static function autenticar()
    {
        $usuario = $_POST["user"];
        $senha = $_POST["pass"];

        $login_dao = new LoginDAO();
        $resultado = $login_dao->getUserByUserAndPass($usuario, $senha);

        if ($resultado !== false) {
            $_SESSION["usuario_logado"] = (array) $resultado;

            /* if(isset($_POST['remember']))
                self::remember($usuario);  */

            //var_dump($_SESSION["usuario_logado"]);

            header("Location: /");
        } else
            header("Location: /login?fail=true");
    }

    public static function sair()
    {
        unset($_SESSION["usuario_logado"]);
        parent::isProtected();
        header("Location: /login");
    }

    public static function getNameOfUser()
    {
        return $_SESSION['usuario_logado']['nome'];
    }

    public static function getIdOfCurrentUser()
    {
        return $_SESSION['usuario_logado']['id'];
    }

    public static function updateNameOfCurrentUser($name)
    {
        $_SESSION['usuario_logado']['nome'] = $name;
    }

    public static function getNameOfCurrentUser()
    {
        return $_SESSION['usuario_logado']['nome'];
    }

    public static function getGrupOfCurrentUser()
    {
        return $_SESSION['usuario_logado']['grupo'];
    }
}
