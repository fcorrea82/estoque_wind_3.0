<?php

namespace App\Controller;

use App\DAO\{UsuarioDAO, UsuarioGrupoDAO};
use App\Model\UsuarioModel;
use stdClass;

class UsuarioController extends Controller
{
    /**
     * O método index() é responsável por listar todos os usuários cadastrados, 
     * obtidos através da classe UsuarioDAO.
     */
    public static function index()
    {
        parent::isProtected();

        $usuario_dao = new UsuarioDAO();
        $lista_usuarios = $usuario_dao->getAllRows();


        include PATH_VIEW . 'modulos/usuario/listar_usuarios.php';
    }

    /**
     * O método ver() é responsável por obter as informações de um usuário específico, 
     * passado como parâmetro id na URL. É importante notar que esse método também carrega 
     * todas as informações dos grupos de usuários, que são obtidos através da classe 
     * UsuarioGrupoDAO.
     */
    public static function ver()
    {
        parent::isProtected();

        if (isset($_GET['id'])) {
            $dao_grupos = new UsuarioGrupoDAO();
            $lista_grupos = $dao_grupos->getAllRows();

            $usuario_dao = new UsuarioDAO();
            $dados_usuario = $usuario_dao->getById($_GET['id']);

            include PATH_VIEW . 'modulos/usuario/cadastrar_usuario.php';
        } else
            header("Location: /usuario");
    }

    /**
     * O método cadastrar() é responsável por carregar a view do formulário de cadastro de usuário, 
     * que é utilizado tanto para cadastro quanto para edição de usuários. É importante notar 
     * que ele também carrega todas as informações dos grupos de usuários.
     */
    public static function cadastrar($dados_usuario = null, array $validations = null)
    {
        parent::isProtected();

        $dao_grupos = new UsuarioGrupoDAO();
        $lista_grupos = $dao_grupos->getAllRows();

        include PATH_VIEW . 'modulos/usuario/cadastrar_usuario.php';
    }

    /**
     * O método salvar() é responsável por salvar os dados do usuário no banco de dados. 
     * Ele realiza a verificação de duplicidade de e-mail e nome de usuário antes de salvar os dados, 
     * e redireciona para a página de edição de usuário com a mensagem de erro correspondente.
     */
    public static function salvar()
    {
        parent::isProtected();

        $usuario_dao = new UsuarioDAO();
        $id_usuario = isset($_POST["id"]) ? (int) $_POST["id"] : null;

        if ($usuario_dao->checkDuplicateEmail($_POST["email"], $id_usuario)) {
            if ($id_usuario !== null)
                header("Location: /usuario/ver?duplicate_email=true&id=" . $id_usuario);
            else {
                $dados_usuario = (object) $_POST;
                self::cadastrar($dados_usuario, array('duplicate_email' => true));
            }
            exit;
        }

        if ($usuario_dao->checkDuplicateUsuario($_POST["usuario"], $id_usuario)) {
            if ($id_usuario !== null)
                header("Location: /usuario/ver?duplicate_user=true&id=" . $id_usuario);
            else
                header("Location: /usuario/cadastrar?duplicate_user=true");
            exit;
        }

        $dados_para_salvar = array(
            'nome'     => $_POST["nome"],
            'email'    => $_POST["email"],
            'usuario'  => $_POST["usuario"],
            'id_grupo' => $_POST["id_grupo"]
        );

        if ($id_usuario !== null) {
            $dados_para_salvar['id'] = $id_usuario;
            $usuario_dao->update($dados_para_salvar);
        } else {
            $usuario_dao->insert($dados_para_salvar);
            echo "Inserido.";
        }
        header("Location:  /usuario");
    }

    /**
     * O método excluir() é responsável por excluir um usuário específico, passado como parâmetro 
     * id na URL.
     */
    public static function excluir()
    {
        parent::isProtected();

        if (isset($_GET['id'])) {
            $usuario_dao = new UsuarioDAO();

            $usuario_dao->delete($_GET['id']);

            header("Location: /usuario?excluido=true");
        } else
            header("Location: /usuario");
    }


    /**
     * O método meusDados() é responsável por exibir as informações do usuário logado, obtido 
     * através da classe UsuarioDAO.
     */
    public static function meusDados()
    {
        parent::isProtected();

        $usuario_dao = new UsuarioDAO();

        $meus_dados = $usuario_dao->getMyUserById(LoginController::getIdOfCurrentUser());


        if (isset($_GET['success'])) {
            $retorno['positivo'] = "Dados alterados com sucesso!";
        }

        if (isset($_GET['wrongpassword'])) {
            $retorno['senha_incorreta'] = "Senha incorreta. As alterações não foram salvas.";
        }

        if (isset($_GET['wrongpasswordconfirmacation'])) {
            $retorno['senha_confirmacao_incorreta'] = "A confirmação da nova senha não confere com a nova senha.";
        }

        require PATH_VIEW . '/modulos/usuario/meus-dados.php';
    }


    /**
     * O método meusDadosSalvar() é responsável por atualizar as informações do usuário logado. 
     * Ele verifica a senha atual do usuário antes de atualizar as informações, e também verifica 
     * se a confirmação da nova senha está correta antes de atualizar.
     */
    public static function meusDadosSalvar()
    {
        parent::isProtected();



        // Verificando se o usuário colocou a senha atual correta
        if (self::checkCurrentUserPassword($_POST['senha_atual'])) {
            // Verificar se o usuário quer alterar a senha
            if (!empty($_POST['nova_senha'])) {
                if ($_POST['nova_senha'] == $_POST['confirmacao_nova_senha']) {
                    $nova_senha = $_POST['nova_senha'];
                } else {
                    header("Location: /usuario/meus-dados?wrongpasswordconfirmacation=true");
                }
            }

            $usuario_dao = new UsuarioDAO();


            $dados_para_salvar = array(
                'id' => LoginController::getIdOfCurrentUser(),
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'usuario' => $_POST['usuario'],
                'id_grupo' => $_POST['id_grupo'],
                'senha' => isset($nova_senha) ? $nova_senha : $_POST['senha_atual']
            );

            $usuario_dao->update($dados_para_salvar);

            LoginController::updateNameOfCurrentUser($dados_para_salvar['nome']);

            header("Location: /usuario/meus-dados?success=true");
        } else
            header("Location: /usuario/meus-dados?wrongpassword=true");
    }


    /**
     * O método checkCurrentUserPassword() é um método privado responsável por verificar a senha 
     * do usuário logado.
     */
    private static function checkCurrentUserPassword($password)
    {
        $usuario_dao = new UsuarioDAO();
        $retorno = $usuario_dao->checkUserByIdAndPassword(LoginController::getIdOfCurrentUser(), $password);
        return (is_object($retorno)) ? true : false;
    }
}
