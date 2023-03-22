<header class="container mt-3">
    <div class="row mb-3">

        <div class="col-md-9">
            <h3>
                SIR 3.0 -
                <small>Sistema de Inventário Restoque</small>
            </h3>
        </div>

        <div class="col-sm">
            <fieldset>
                <legend>Dados do usuário</legend>
                Bem-vindo <strong> <?= LoginController::getNameOfUser(); ?> </strong> <a class="btn btn-dark" href="/sair">Sair</a>

            </fieldset>
        </div>

    </div>

    <!--<nav class="navbar navbar-expand-lg bg-light">
   
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"> 
                <a class="nav-link" href="/"> Tela Inicial </a> 
            </li>
       
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categoria
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/categoria/cadastrar">Cadastrar Categoria</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/categoria/listar">Listar Categoria</a></li>
                    
                    
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Marca
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Cadastrar Marca</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Listar Marca</a></li>
                    
                   
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Produto
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/produto/cadastrar">Cadastrar Produto</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/produto/listar">Listar Produto</a></li>
                    
                    
                </ul>
            </li>
        </ul>
    </div>
</nav> -->

    <!-- menu novo -->

    <div class="container py-3" id="container">


        <nav class="navbar navbar-light bg-light navbar-expand-sm mb-3">
            <!--<a class="navbar-brand">Navbar</a> -->

          <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                <a href="/" class="nav-link" tabindex="0">
                            Inicio
                        </a>
                    <li class="nav-item dropdown">
                         
                        <a class="nav-link dropdown-toggle" tabindex="0" data-toggle="dropdown" data-submenu>
                            Cadastro
                        </a>

                        <div class="dropdown-menu">
                            
                       


                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Armazenamento</button>

                                <div class="dropdown-menu">
                                    

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">HD's</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Pendrive</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>
  
                                </div>
                            </div>

                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Automação Comercial</button>

                                <div class="dropdown-menu">
                                    

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Pin Pads</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">POS</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>
  
                                </div>
                            </div>

                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Computador</button>

                                <div class="dropdown-menu">
                                    

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">PC - Micros</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>
  
                                </div>
                            </div>

                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Energia</button>

                                <div class="dropdown-menu">
                                    

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Estabilizadores</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Injetores POE</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Transformadores</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>
  
                                </div>
                            </div>

                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Impressoras</button>

                                <div class="dropdown-menu">
                                    

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Lasers</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Térmicas Argox</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Fiscais</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

  
                                </div>
                            </div>

                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Lojas</button>

                                <div class="dropdown-menu">
                                    

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Loja</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>
  
                                </div>
                            </div>

                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Multimídia</button>

                                <div class="dropdown-menu">

                                <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Aparelho de Som</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Amplificadores</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">DVD's</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>
                                    

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Câmeras CFTV</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">DVR's</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>
  
                                </div>
                            </div>

                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Produtos</button>

                                <div class="dropdown-menu">

                                <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Produto</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="/produto/cadastrar">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="/produto/listar">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Marca</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="/marca/cadastrar">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="/marca/listar">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Categoria</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="/categoria/cadastrar">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="/categoria/listar">Listar</a></button>
                                        </div>
                                    </div>
                                    </div>

                            </div>

                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Periféricos</button>

                                <div class="dropdown-menu">
                                    

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Monitores</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Teclados</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Mouses</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Leitores Código Barras </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
    
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Leitores Consulta Preço </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
    
                                    </div>


  
                                </div>
                            </div>

                        

                            

                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Outros</button>

                                <div class="dropdown-menu">
                                    

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Coletor de Dados</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Contador de Fluxo</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button"><a href="#">Cadastrar</a></button>
                                            <button class="dropdown-item" type="button"><a href="#">Listar</a></button>
                                        </div>
                                    </div>

                                    

                                    

                                    


  
                                </div>
                            </div>
                            <!--
                            <button class="dropdown-item" type="button">Something else here</button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" type="button">Separated link</button>
                            -->
                        </div>
                    </li>

                <!-- segundo menu inicio -->

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" tabindex="0" data-toggle="dropdown" data-submenu>
                            Relatórios
                        </a>

                        <div class="dropdown-menu">
                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Action</button>

                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button">Sub action</button>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Another sub action</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button">Sub action</button>
                                            <button class="dropdown-item" type="button">Another sub action</button>
                                            <button class="dropdown-item" type="button">Something else here</button>
                                        </div>
                                    </div>

                                    <button class="dropdown-item" type="button">Something else here</button>
                                    <button class="dropdown-item" type="button" disabled>Disabled action</button>

                                    <div class="dropdown dropright dropdown-submenu">
                                        <button class="dropdown-item dropdown-toggle" type="button">Another action</button>

                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" type="button">Sub action</button>
                                            <button class="dropdown-item" type="button">Another sub action</button>
                                            <button class="dropdown-item" type="button">Something else here</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="dropdown dropright dropdown-submenu">
                                <button class="dropdown-item dropdown-toggle" type="button">Another action</button>

                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button">Sub action</button>
                                    <button class="dropdown-item" type="button">Another sub action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>
                            </div>

                            <button class="dropdown-item" type="button">Something else here</button>
                            <div class="dropdown-divider"></div>
                            <button class="dropdown-item" type="button">Separated link</button>

                        </div>
                    </li>


                </ul>


            </div>

            <!-- segundo menu fim -->


                </ul>


            </div>

            

        </nav>


    </div>

    <a class="js-scroll-top scroll-top btn btn-primary btn-sm hidden" href="#container" hidden>
    </a>


</header>