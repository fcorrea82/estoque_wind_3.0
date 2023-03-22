<?php


try {

   switch ($uri_parse) {

         // Tela inicial
      case '/':
         DashboardController::index();
         break;

         //Rotas para trabalhar com login
      case '/login':
         LoginController::login();
         break;

         // Fazer login -> autenticar usuario
      case '/autenticar':
         LoginController::autenticar();
         break;

      case '/sair':
         LoginController::sair();
         break;

         //Rotas para trabalhar com produtos.
      case '/produto/listar':
         ProdutoController::listarProdutos();
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


         //Rotas para trabalhar com categorias
      case '/categoria/listar':
         CategoriaController::listarCategorias();
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





      default:
         echo "Rota inválida";
         break;
   }
} catch (Exception $e) {
   echo "Deu ruim" . $e->getMessage();
}
