<?php

class login{

    public function __construct(){
        //se não tiver session iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //chama para rerificar dados
        $this->verificar();
    }



    public function verificar(){
        //conecta mongodb localhost
        $db = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        
        //monta query
        $query = new MongoDB\Driver\Query(array('email' => $_POST['email'], 'senha' => $_POST['senha']));
        //executa query
        $result = $db->executeQuery('votos.usuario', $query);
        //resultado pra array
        $result = $result->toArray();

        //se não logar -> dados errados
        if(empty($result)){
            header("location: http://localhost/mongoDBproject/screens/login.php");
        }
        else{ //se logar
            //sessions de usuário
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['senha'] = $_POST['senha'];

            //se usuário já votou, vai para pagina de resultados
            $votou = $result[0]->votou;
            if($votou == 1){
                header("location: http://localhost/mongoDBproject/screens/result.php");
            }
            else{//se não, vai para pagina de votação
                header("location: http://localhost/mongoDBproject/");
            }
        }
    }

}


?>