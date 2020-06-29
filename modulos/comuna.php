<?php
include "../global/conexion.php";

$idRegion = ($_POST['idRegion']);

$conn= new DB;
$queryCom = $conn->connect()->prepare("SELECT * FROM comuna 
                                       WHERE idRegion=:idRegion");
$queryCom->execute(['idRegion'=>$idRegion]);

$html = "<option selected value='0'> Comuna </option>";
echo $html;
while ($comuna = $queryCom->fetch(PDO::FETCH_ASSOC)) { 
    $html = "<option value='" . $comuna['idComuna'] . "'> " . $comuna['comuna'] . "</option>";  
    echo $html;
}

?>