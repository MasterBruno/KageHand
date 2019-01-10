<?php
    class Conexao {

    private $link;
    private $servername = "localhost";
    private $username = "u667552060_root";
    private $database = "u667552060_repgm";
    private $password = "host10";

    function __construct() {
        //  Versão WEB
        //  $this->link = new PDO("mysql:host=$this->servername;dbname=$this->database;charset=utf8", "$this->username", "$this->password");
        //  $this->link = new PDO("mysql:host=$this->servername;dbname=$this->database;charset=utf8", "$this->username", "$this->password");
        //  Versão Local - Bruno
        $this->link = new PDO("mysql:host=localhost;dbname=KageHand;charset=utf8", "root", "root10");
        
        $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function conexao() {
        if (!$this->link) {
            echo "Error: Conexão interrompida com MySQL." . PHP_EOL;
            return null;
        } else {
            //  echo "Sucesso!</br>";
            return $this->link;
        }
    }

    function busca($query) {
        $consulta = $this->link->prepare($query);
        $consulta->execute();
        $linha = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $linha;
    }

    }
?>
