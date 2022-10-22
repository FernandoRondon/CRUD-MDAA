<?php
include_once 'conexion.php';
class categoria{
    var $objetos;
    public function __construct(){
        $db= new conexion();
        $this->acceso=$db->pdo;
    }

    function crear($nombre){
        $sql="SELECT id, estado FROM categoria where nombre=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            foreach ($this->objetos as $cat) {
                $cat_id= $cat->id;
                $cat_estado = $cat->estado;
             }
             if($cat_estado==1){
                 echo 'noadd';
             }
             else{
                 $sql="UPDATE categoria SET estado=1 where categoria.id=:id";
                 $query = $this->acceso->prepare($sql);
                 $query->execute(array(':id'=>$cat_id));
                 echo 'add';
             }
        }
        else{
            $sql="INSERT INTO categoria(nombre) values (:nombre);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre));
            echo 'add';
        }
    }



    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM categoria where estado=1 and nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM categoria where estado=1 and nombre NOT LIKE '' ORDER BY id LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
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
    // function editar($nombre,$id_editado){
    //     $sql="UPDATE tipo_producto SET nombre=:nombre where id_tip_prod=:id";
    //     $query = $this->acceso->prepare($sql);
    //     $query->execute(array(':id'=>$id_editado,':nombre'=>$nombre));
    //     echo 'edit';
    // }
    // function rellenar_tipos(){
    //     $sql="SELECT * FROM tipo_producto WHERE estado='A' order by nombre asc";
    //     $query = $this->acceso->prepare($sql);
    //     $query->execute();
    //     $this->objetos = $query->fetchall();
    //     return $this->objetos;
    // }
}
?>