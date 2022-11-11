<?php
  include_once 'conexion.php';
  class historial {
    var $objetos;
    public function __construct(){
      $db = new conexion();
      $this->acceso=$db->pdo;
    }

    function listar(){
      $sql="SELECT * FROM consulta JOIN categoria ON consulta_categoria = id_categoria";
      $query = $this->acceso->prepare($sql);
      $query->execute();
      $this->objetos=$query->fetchall();
      return $this->objetos;
    }  

    function cantidad_categoria(){
      $sql="SELECT COUNT(id_categoria) as cantidad_categoria FROM categoria";
      $query = $this->acceso->prepare($sql);
      $query->execute();
      $this->objetos=$query->fetchall();
      return $this->objetos;
    }
    function cantidad_codigo(){
        $sql="SELECT COUNT(id_des) as cantidad_codigo FROM des_categoria";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
    function cantidad_consulta(){
      $sql="SELECT COUNT(id_consulta) as cantidad_consulta FROM consulta";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }



  }
?>