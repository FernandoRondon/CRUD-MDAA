<?php
include_once 'conexion.php';
class consulta{
    var $objetos;
    public function __construct(){
        $db= new conexion();
        $this->acceso=$db->pdo;
    }
   
    // function rellenar_categorias()
    // {
    //     $sql="SELECT * FROM categoria WHERE categoria_estado=1 order by id_categoria asc";
    //     $query = $this->acceso->prepare($sql);
    //     $query->execute();
    //     $this->objetos=$query->fetchall();
    //     return $this->objetos;
    // }
  
    // function rellenar_codigos($categoria)
    // {
    //     $sql="SELECT id_des, CONCAT(codigo,' | ',des_nombre) as nombre FROM des_categoria JOIN categoria ON id_des_categoria = id_categoria WHERE id_des_categoria = :categoria_nomb and des_estado=1 order by id_des asc";
    //     $query = $this->acceso->prepare($sql);
    //     // $query->execute();
    //     $query->execute(array(':categoria_nomb'=>$categoria));
    //     $this->objetos=$query->fetchall();
    //     return $this->objetos;
    // }

    function rellenar_codigos()
    {
        $sql="SELECT id_des_categoria, CONCAT(codigo,' | ',des_nombre) as nombre FROM des_categoria WHERE des_estado=1 order by id_des asc";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }


    function crear($usuario,$categoria,$codigo,$fecha_hora,$observacion)
    {
        $sql="INSERT INTO consulta(consulta_usuario,consulta_categoria,consulta_codigo,consulta_fecha,consulta_obs) values (:usuario,:categoria,:codigo,:fecha,:obs);";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':usuario'=>$usuario,':categoria'=>$categoria,':codigo'=>$codigo,':fecha'=>$fecha_hora,':obs'=>$observacion));
        echo 'add';
    }
    

    
    function rellenar_categorias($codigo)
    {
        $sql="SELECT id_categoria, categoria_nombre FROM des_categoria RIGHT JOIN categoria ON id_des_categoria = id_categoria  WHERE id_des_categoria= :codigo_nomb and categoria_estado=1 LIMIT 1";
        $query = $this->acceso->prepare($sql);
        // $query->execute();
        $query->execute(array(':codigo_nomb'=>$codigo));
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }

}
?>