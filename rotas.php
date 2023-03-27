<?php

use App\Controller\{
    DashboardController,
    LoginController,
    ProdutoController,
    CategoriaController,
    UsuarioController,
    UsuarioGrupoController,
    MarcaController
};

try {

    switch ($uri_parse) {
            // Tela inicial.
        case '/':
            DashboardController::index();
            break;


            // Rotas para trabalhar com Login
        case '/login':
            LoginController::login();
            break;

        case '/autenticar':
            LoginController::autenticar();
            break;

        case '/esqueci-a-senha':
            LoginController::esqueciSenha();
            break;

        case '/enviar-nova-senha':
            LoginController::enviarNovaSenha();
            break;

        case '/sair':
            LoginController::sair();
            break;


            // Rotas para trabalhar com o usuário
        case '/usuario':
            UsuarioController::index();
            break;

        case '/usuario/cadastrar':
            UsuarioController::cadastrar();
            break;

        case '/usuario/salvar':
            UsuarioController::salvar();
            break;

        case '/usuario/ver':
            UsuarioController::ver();
            break;

        case '/usuario/excluir':
            UsuarioController::excluir();
            break;

        case '/usuario/meus-dados':
            UsuarioController::meusDados();
            break;

        case '/usuario/meus-dados/salvar':
            UsuarioController::meusDadosSalvar();
            break;




            // Rotas para trabalhar com grupo de usuário
        case '/usuario/grupo':
            UsuarioGrupoController::index();
            break;

        case '/usuario/grupo/ver':
            UsuarioGrupoController::ver();
            break;

        case '/usuario/grupo/cadastrar':
            UsuarioGrupoController::cadastrar();
            break;

        case '/usuario/grupo/salvar':
            UsuarioGrupoController::salvar();
            break;

        case '/usuario/grupo/excluir':
            UsuarioGrupoController::excluir();
            break;




            // Rotas para trabalhar com produtos.
        case '/produto/listar':
            ProdutoController::index();
            break;

        case '/produto/cadastrar':
            ProdutoController::cadastrar();
            break;

        case '/produto/salvar':
            ProdutoController::salvar();
            break;

        case '/produto/ver':
            ProdutoController::ver();
            break;

        case '/produto/excluir':
            ProdutoController::excluir();
            break;



            // Rotas para trabalhar com categorias
        case '/categoria/listar':
            CategoriaController::index();
            break;

        case '/categoria/cadastrar':
            CategoriaController::cadastrar();
            break;

        case '/categoria/salvar':
            CategoriaController::salvar();
            break;

        case '/categoria/ver':
            CategoriaController::ver();
            break;

        case '/categoria/excluir':
            CategoriaController::excluir();
            break;

            //Rotas para trabalhar com Marcas

        case '/marca/listar':
            MarcaController::listarMarcas();
            break;

        case '/marca/cadastrar':
            MarcaController::cadastrar();
            break;

        case '/marca/salvar':
            MarcaController::salvar();
            break;

        case '/marca/ver':
            MarcaController::ver();
            break;

        case '/marca/excluir':
            MarcaController::excluir();
            break;

            //Rotas para trabalhar com Armazenamento
            //HD
            
             case '/hd/listar':
            //HDController::listarhds();
            break;

        case '/hd/cadastrar':
            //HDController::cadastrar();
            break;

        case '/hd/salvar':
           // HDController::salvar();
            break;

        case '/hd/ver':
           // HDController::ver();
            break;

        case '/hd/excluir':
          //  HDController::excluir();
            break;
            
         //Pen drive
          
                 case '/pendrive/listar':
            //PendriveController::listarpendrive();
            break;

        case '/pendrive/cadastrar':
            //PendriveController::cadastrar();
            break;

        case '/pendrive/salvar':
           // PendriveController::salvar();
            break;

        case '/pendrive/ver':
           // PendriveController::ver();
            break;

        case '/pendrive/excluir':
          //  PendriveController::excluir();
            break;
            
            
         //Rotas para trabalhar com Automação Comercial
            
            //Pin Pad
               case '/pinpad/listar':
            //PinpdadController::listarpendrive();
            break;

        case '/pinpad/cadastrar':
            //PinpadController::cadastrar();
            break;

        case '/pinpad/salvar':
           // PinpadController::salvar();
            break;

        case '/pinpad/ver':
           // PinpadController::ver();
            break;

        case '/pinpad/excluir':
          //  PinpadController::excluir();
            break;



        default:
            echo "Rota inválida";
            //   echo $uri_parse;
            break;
    }
} catch (Exception $e) {
    echo "Rota não encontrada " . $e->getMessage();
}
