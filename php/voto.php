<?php

class voto{

    private $voto;

    public function __construct($voto) {
        //se não tiver session iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //define private voto
        $this->voto = $voto;
        //chama para votar
        $this->votar();
    }





    
    public function votar() {
        // conecta mongodb localhost
        $db = new MongoDB\Driver\Manager("mongodb://localhost:27017");

        //-------------------pega número de votos----------------
        $query = new MongoDB\Driver\Query(array('cor' => $this->voto));
        $result = $db->executeQuery('votos.candidatos', $query);
        $result = $result->toArray();
        $numVotos = $result[0]->votos;

        //------------------adiciona voto-------------------------
        $bulk = new MongoDB\Driver\BulkWrite();
        $bulk->update(['cor' => $this->voto], ['$set' => ['votos' => $numVotos+1]]);

        //-----------muda status do usuário -> votou => 1-------------------
        $bulk2 = new MongoDB\Driver\BulkWrite();
        $bulk2->update(['email' => $_SESSION['email'], 'senha' => $_SESSION['senha']], ['$set' => ['votou' => 1]]);
        
        //executa o update em candidato e usuário
        if($db->executeBulkWrite('votos.candidatos', $bulk)){
            $db->executeBulkWrite('votos.usuario', $bulk2);
            header("location: http://localhost/mongoDBproject/screens/result.php");
        }
        else{
            echo "Um erro aconteceu :(";
        }
    }


}


?>