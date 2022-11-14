<?php
include_once 'conexion.php';
class categoria{
    var $objetos;
    public function __construct(){
        $db= new conexion();
        $this->acceso=$db->pdo;
    }

    function crear($codigo, $nombre){
        $sql="SELECT * FROM categoria where categoria_codigo=:codigo OR categoria_nombre=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre, ':codigo'=>$codigo));
   
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            foreach ($this->objetos as $cat) {
                $cat_id= $cat->id_categoria;
                $cat_estado = $cat->categoria_estado;
             }
             if($cat_estado==1){
                 echo 'noadd';
             }
             else{
                 $sql="UPDATE categoria SET categoria_estado=1 where id_categoria=:id";
                 $query = $this->acceso->prepare($sql);
                 $query->execute(array(':id'=>$cat_id));
                 echo 'add';
             }
        }
        else{
            $sql="INSERT INTO categoria(categoria_nombre,categoria_codigo,categoria_estado) values (:nombre,:codigo,:estado);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':codigo'=>$codigo,':nombre'=>$nombre,'estado'=>1));
            echo 'add';
        }
    }



    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM categoria where categoria_estado=1 and categoria_nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM categoria where categoria_estado=1 and categoria_nombre NOT LIKE '' ORDER BY id_categoria LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
   
    function borrar($id){
        $sql="SELECT * FROM des_categoria where id_des_categoria=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $cat=$query->fetchall();
        if(!empty($cat)){
            echo 'noborrado';
        }
        else{
            $sql="UPDATE categoria SET categoria_estado=0 where id_categoria=:id";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id));
            if(!empty($query->execute(array(':id'=>$id)))){
                echo 'borrado';
            }
            else{
                echo 'noborrado';
            }
        }
    }
    
    function editar($codigo, $nombre,$id_editado){
        $sql="SELECT * FROM categoria where categoria_codigo=:codigo";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':codigo'=>$codigo));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noedit';
        }
        else
        {
            $sql="UPDATE categoria SET categoria_nombre=:nombre, categoria_codigo=:codigo where id_categoria=:id";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id_editado,':nombre'=>$nombre, ':codigo'=>$codigo));
            echo 'edit';
        }
    }
}
?>