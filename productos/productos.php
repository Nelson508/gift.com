<?php

include_once '../global/conexion.php';

class Productos extends DB{

    function __construct()
    {
        parent::__construct();
    }

    public function get(){

        $query = $this->connect()->prepare("SELECT * FROM producto");
        $query->execute();

        $row = $query->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    public function getItemsByCategory($category){

        $query = $this->connect()->prepare("SELECT * FROM poproducto
                                                      AND Categoria = :cat");
        $query->execute(['cat'=>$category]);

        $items = [];

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $item = [
                'IDproducto' => $row['IDproducto'],
                'NombreProducto' => $row['NombreProducto'],
                'Categoria'      => $row['Categoria'],
                'Cantidad'       => $row['Cantidad'],
                'Dimensiones'    => $row['Dimensiones'],
                'Modelo'         => $row['Modelo'],
                'Descripcion'    => $row['Descripcion'],
                'Imagen'         => $row['Imagen'],
                ];

                array_push($items,$item);
            
        }

        return $items;

        
    }



}



?>