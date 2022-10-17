<?php
  include_once 'conexion.php';
  class tabla {
    var $objetos;
    public function __construct(){
      $db = new conexion();
      $this->acceso=$db->pdo;
    }

    function buscar(){
      if (!empty($_POST['consulta'])){
        $consulta = $_POST['consulta'];
        $sql="SELECT * FROM clave_pnp where descripcion LIKE :consulta"; 
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':consulta'=>"%$consulta%"));
        $this->objetos=$query->fetchall();
        return $this->objetos;
      }
      else{
        $sql="SELECT * FROM clave_pnp where descripcion NOT LIKE '' ORDER BY id LIMIT 25";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
      }
    }  
  }
?>