<?php

include "../global/conexion.php";

    $txtCorreo = ($_POST['txtCorreo']);

    if (!filter_var($txtCorreo, FILTER_VALIDATE_EMAIL) === false) {

        //if(!empty($_POST['txtCorreo'])) {
            //include "global/conexion.php";

            $conn= new DB;
            $sentenciaSQL=$conn->connect()->prepare("SELECT * FROM usuarios 
                                                    WHERE email=:email");

            $sentenciaSQL->bindParam("email",$txtCorreo,PDO::PARAM_STR);
            $sentenciaSQL->execute();
            $user_count=$sentenciaSQL->rowCount();
            
            if($user_count>0) {
                echo 1;
                
            }else{
                echo 2;

            }
        //}

        
    }

?>