<?php
include_once 'conexion.php';
class categoria{
    var $objetos;
    public function __construct(){
        $db= new conexion();
        $this->acceso=$db->pdo;
    }

    function crear($clave, $nombre){
        $sql="SELECT * FROM categoria where categoria_nombre=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
   
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
            $sql="INSERT INTO categoria(id_tipo_categoria,categoria_nombre,categoria_estado) values (:clave,:nombre,:estado);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':clave'=>$clave,':nombre'=>$nombre,'estado'=>1));
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
   
    function rellenar_claves()
    {
        $sql="SELECT * FROM tipo_categoria";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }


    // function borrar($id){
    //     $sql="SELECT * FROM producto where prod_tip_prod=:id";
    //     $query = $this->acceso->prepare($sql);
    //     $query->execute(array(':id'=>$id));
    //     $tip=$query->fetchall();
    //     if(!empty($tip)){
    //         echo 'noborrado';
    //     }
    //     else{
    //         $sql="UPDATE tipo_producto SET estado='I' where id_tip_prod=:id";
    //         $query = $this->acceso->prepare($sql);
    //         $query->execute(array(':id'=>$id));
    //         if(!empty($query->execute(array(':id'=>$id)))){
    //             echo 'borrado';
    //         }
    //         else{
    //             echo 'noborrado';
    //         }
    //     }


    // }
    function editar($clave,$nombre,$id_editado){
        $sql="UPDATE categoria SET nombre=:nombre where id=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_editado,':nombre'=>$nombre));
        echo 'edit';
    }
}
?>