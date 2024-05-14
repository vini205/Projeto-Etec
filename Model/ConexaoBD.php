<?php

Class ConexaoBD{
    /**
     * Nome do server
     *
     * @var string
     */
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "";
    private $dbName = "projeto_final";

    
    /**
     * Faz conexão com o BD
     * Retorna true, case sucesso, e  false caso tenha erro
     * @return object
     */
    public function conectar()
    {

        $conn = mysqli_connect($this->serverName,$this->userName, $this->password, $this->dbName);
        if($conn == false){
            echo "not connected to BD";
        }

        return $conn;
    }
}