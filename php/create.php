<?php

class cadastro{

    public function __construct(){
        //se não tiver session iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //chama para criar usuário
        $this->createUser();
    }



    
    public function createUser(){
        // conecta mongodb localhost
        $db = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        //monta o insert
        $bulk = new MongoDB\Driver\BulkWrite();
        $bulk->insert(['email' => $_POST['email'], 'senha' => $_POST['senha'], 'votou' => 0]);

        //executa o insert
        if($db->executeBulkWrite('votos.usuario', $bulk)){
            header("location: http://localhost/mongoDBproject/screens/login.php");
        }
        else{
            echo "Um erro aconteceu :(";
        }
    }

}


?>