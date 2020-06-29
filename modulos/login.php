<?php

if(isset($_POST["btnLogin"])){

    include "global/conexion.php";

    $txtEmail = ($_POST['txtEmail']);
    $txtPassword=($_POST['txtPassword']);

    $conn= new DB;
    $sentenciaSQL=$conn->connect()->prepare("SELECT * FROM usuarios 
                                              WHERE email=:email");

    $sentenciaSQL->bindParam("email",$txtEmail,PDO::PARAM_STR);
    $sentenciaSQL->execute();

    $registro=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
    
    if(password_verify($txtPassword, $registro['Password'])){       
            
        $numerRegistros=$sentenciaSQL->rowCount();
    

        if($numerRegistros>=1){
            
            session_start();
            $_SESSION['usuario']=$registro;
            echo "Bienvenido...";

            if(isset($_POST['remember'])){
                setcookie("User", serialize($registro), time()+3600, "/");
            }else{
                setcookie("User", null, time()-1, "/");
            }


            if($registro['Tipo_Usuario']=='Administrador'){
                header('Location:Vistapanel.php');

            }else if($registro['Tipo_Usuario']=='Persona'){
                header('Location:indexUsuario.php');

            }   
        }

    }else{
        echo "No se encontraron registros";

    }

    echo "<br/> hay que validar el correo y la cotraseña";
}
        

?>