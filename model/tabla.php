<?php
  include_once 'conexion.php';
  class tabla {
    var $objetos;
    public function __construct(){
      $db = new conexion();
      $this->acceso=$db->pdo;
    }

    function buscar(){
      $sql="SELECT tipo_categoria.nombre as Tipo_Categoria, categoria.nombre as Categoria, des_categoria.nombre as Nombre, des_categoria.codigo as Codigo, sub_categoria.nombre as Descripcion
      FROM tipo_categoria 
      JOIN categoria ON tipo_categoria.id = categoria.id_tipo_categoria
      JOIN des_categoria ON categoria.id = des_categoria.idCategoria
      LEFT JOIN sub_categoria ON des_categoria.id = sub_categoria.id_des_categoria";
      $query = $this->acceso->prepare($sql);
      $query->execute();
      $this->objetos=$query->fetchall();
      return $this->objetos;
    }  
  }
?>
