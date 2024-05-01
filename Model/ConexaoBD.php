<?php

Class ConexaoBD{
    /**
     * Nome do server
     *
     * @var string
     */
    private $serverName = "localhost";
    private $userName = "root";
    private $password = "usbw";
    private $dbName = "projeto_final";
	



    public function conectar()
    {
        $conn = new mysqli($this->serverName,$this->userName, $this->password, $this->dbName);
        return $conn;
    }
}