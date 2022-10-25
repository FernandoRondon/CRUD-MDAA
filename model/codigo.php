<?php
include_once 'conexion.php';
class codigo{
    var $objetos;
    public function __construct(){
        $db= new conexion();
        $this->acceso=$db->pdo;
    }

    function crear($codigo, $nombre){
        $sql="SELECT * FROM des_categoria where des_nombre=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
   
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            foreach ($this->objetos as $des) {
                $des_id= $des->id_des;
                $des_estado = $des->des_estado;
             }
             if($des_estado==1){
                 echo 'noadd';
             }
             else{
                 $sql="UPDATE des_categoria SET des_estado=1 where id_des=:id";
                 $query = $this->acceso->prepare($sql);
                 $query->execute(array(':id'=>$des_id));
                 echo 'add';
             }
        }
        else{
            $sql="INSERT INTO des_categoria(id_des,des_nombre,des_estado) values (:codigo,:nombre,:estado);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':codigo'=>$codigo,':nombre'=>$nombre,'des_estado'=>1));
            echo 'add';
        }
    }

    function buscar(){
      if(!empty($_POST['consulta'])){
          $consulta=$_POST['consulta'];
          $sql="SELECT * FROM des_categoria where des_estado=1 and des_nombre LIKE :consulta";
          $query = $this->acceso->prepare($sql);
          $query->execute(array(':consulta'=>"%$consulta%"));
          $this->objetos=$query->fetchall();
          return $this->objetos;
      }
      else{
          $sql="SELECT * FROM des_categoria where des_estado=1 and des_nombre NOT LIKE '' ORDER BY id_des LIMIT 25";
          $query = $this->acceso->prepare($sql);
          $query->execute();
          $this->objetos=$query->fetchall();
          return $this->objetos;
      }
    }

    function rellenar_codigos()
    {
        $sql="SELECT * FROM des_categoria WHERE des_estado=1 order by des_nombre asc";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }

}
?>