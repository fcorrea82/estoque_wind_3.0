<?php

class Banco
{
    private static $dbNome = 'estoque_novo';
    private static $dbHost = 'localhost';
    private static $dbUsuario = 'root';
    private static $dbSenha = '';
    
    private static $cont = null;
    
    public function __construct() 
    {
        die('A função Init nao é permitido!');
    }
    
    public static function conectar()
    {
        if(null == self::$cont)
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbNome, self::$dbUsuario, self::$dbSenha);
                
            }
            catch(PDOException $exception)
            {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }
    
    public static function desconectar()
    {
        self::$cont = null;
    }
}

//Parametros de conexão para os relatórios de exportação por excel


//Inicio da conexão com o banco de dados utilizando PDO
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "estoque";
$port = 3306;

try {
    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso.";
} catch (PDOException $err) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
    //Fim da conexão com o banco de dados utilizando PDO


//parametros de conexão para o login

class MySQL extends PDO {

    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $db = "estoque";


    public function __construct()
    {
        //data source name
        $dsn = "mysql:host=". $this->host . ";dbname=" . $this->db;

        //PHP Data Object
        return parent::__construct($dsn, $this->usuario, $this->senha);


    }
}

// Parâmetros de conexão para os relatorios pdf. 
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "estoque"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 


// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}

//conexao.php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "estoque";
    
//Criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
