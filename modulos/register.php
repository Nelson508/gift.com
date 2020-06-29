<?php
 include "global/conexion.php";

$conn= new DB;

if(isset($_POST['btnRegister'])){

    $txtName    =($_POST['txtNombre']);
    $txtSurname =($_POST['txtApellido']);
    $txtRut     =($_POST['txtRut']);
    $txtEmail   =($_POST['txtCorreo']);
    $txtPhono   =($_POST['txtPhono']);
    $cbxComuna  =($_POST['cbxComuna']);
    $txtPassword=($_POST['txtPass']);
    //$txtRetypePassword=($_POST['txtRetypePass']);

    
    //if($txtPassword==$txtRetypePassword){

        $passCifrado= password_hash($txtPassword, PASSWORD_DEFAULT, array("coste"=>12));
        

        $sentenciaSQL=$conn->connect()->prepare("INSERT INTO usuarios (IDUsuario, Tipo_Usuario, Nombres, Apellidos, RUT, Telefono, Email, idComuna, Password, Foto) 
                                                 VALUES (NULL, 'Persona', :nombres, :apellidos, :rut, :telefono, :email, :comuna, :password, '')");

        $sentenciaSQL->bindParam("nombres",$txtName,PDO::PARAM_STR);
        $sentenciaSQL->bindParam("apellidos",$txtSurname,PDO::PARAM_STR);
        $sentenciaSQL->bindParam("rut",$txtRut,PDO::PARAM_STR);
        $sentenciaSQL->bindParam("telefono",$txtPhono,PDO::PARAM_STR);
        $sentenciaSQL->bindParam("email",$txtEmail,PDO::PARAM_STR);
        $sentenciaSQL->bindParam("comuna",$cbxComuna,PDO::PARAM_INT);
        $sentenciaSQL->bindParam("password",$passCifrado,PDO::PARAM_STR);
        $sentenciaSQL->execute();

        if ($sentenciaSQL->rowCount() == 1) { 

            header('Location:login.php');
        }
        
    //}
}   


$query = $conn->connect()->prepare("SELECT * FROM regiones");
$query->execute();

?>