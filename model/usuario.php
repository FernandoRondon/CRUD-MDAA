<?php
include_once 'conexion.php';
class usuario {
    var $objetos;
    public function __construct(){
        $db = new conexion();
        $this->acceso = $db->pdo;
    }

    // LOGIN
    function loguearse($correo,$pass){
        $sql="SELECT * FROM usuario JOIN tipo_usuario ON id_tip_user = id_tipo WHERE correo=:correo AND estado=1";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':correo' => $correo));
        $objetos = $query->fetchAll();
        foreach ($objetos as $objeto) {
            $contrasena_actual = $objeto->contrasena;
        }
        if(strpos($contrasena_actual,'$2y$10$')===0){
            if(password_verify($pass,$contrasena_actual)){
                return "logueado";
                
            }
        }
        else
        {
            if($pass==$contrasena_actual){
                return "logueado";
            }
        }
    }

    function obtener_dato_logueo($correo){
        $sql="SELECT id, nombre, CONCAT(nombre,' ',apellido) as consultor, id_tip_user FROM usuario join tipo_usuario on id_tip_user=id_tipo and correo=:correo";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':correo'=>$correo));
        $this->objetos= $query->fetchall();
        return $this->objetos;
    } 



    // GESTIÓN USUARIO
    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM usuario join tipo_usuario on id_tip_user=id_tipo join estado on estado = id_estado where usuario_visibilidad = 1 and nombre LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM usuario join tipo_usuario on id_tip_user=id_tipo join estado on estado = id_estado where usuario_visibilidad = 1 and nombre NOT LIKE '' ORDER BY id LIMIT 25";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }

    function rellenar_estados()
    {
        $sql="SELECT * FROM estado";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }

    function crear($nombre,$apellido,$edad,$dni,$residencia,$telefono,$correo,$pass,$tipo,$estado,$usuario_visibilidad,$avatar){
        $sql="SELECT id, usuario_visibilidad FROM usuario where correo=:correo or dni=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':correo'=>$correo,':dni'=>$dni));
        $this->objetos=$query->fetchall();

        if(!empty($this->objetos)){
            // echo 'noadd';

            foreach ($this->objetos as $usu) {
                $usu_id_usuario = $usu->id;
                $usu_visible = $usu->usuario_visibilidad;
            }
            if ($usu_visible == 1) {
                echo 'noadd';
            }else{
                $sql="UPDATE usuario SET usuario_visibilidad=1, estado=1 where id=:id ";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$usu_id_usuario));
                echo 'add';
            }
        }
        else{
            $sql="INSERT INTO usuario(nombre,apellido,edad,dni,residencia,telefono,correo,contrasena,id_tip_user,estado,usuario_visibilidad,avatar) VALUES (:nombre,:apellido,:edad,:dni,:residencia,:telefono,:correo,:pass,:id_tip_user,:estado,:usuario_visibilidad,:avatar);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':apellido'=>$apellido,':edad'=>$edad,':dni'=>$dni,':residencia'=>$residencia,':telefono'=>$telefono,':correo'=>$correo,':pass'=>$pass,':id_tip_user'=>$tipo,':estado'=>$estado,':usuario_visibilidad'=>$usuario_visibilidad,':avatar'=>$avatar));
            echo 'add';
        }
    }

    function editar($id_usuario,$nombre,$apellidos,$telefono,$residencia,$correo){
        $sql="UPDATE usuario SET nombre=:nombre, apellido=:apellido, telefono=:telefono, residencia=:residencia,correo=:correo where id=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':nombre'=>$nombre,':apellido'=>$apellidos,':telefono'=>$telefono,':residencia'=>$residencia,':correo'=>$correo));
        echo 'edit';
    }

    function editar_usuario($id,$nombre,$apellido,$residencia,$telefono,$contrasena,$estado){
        $sql="UPDATE usuario SET nombre=:nombre, apellido=:apellido, residencia=:residencia, telefono=:telefono, contrasena=:contrasena, estado=:estado where id=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id,':nombre'=>$nombre,':apellido'=>$apellido,':residencia'=>$residencia,':telefono'=>$telefono,':contrasena'=>$contrasena,':estado'=>$estado));
        echo 'edit';
    }

    function borrar($pass,$id_borrado,$id_usuario){
        $sql="SELECT * FROM usuario where id=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario));
        $this->objetos=$query->fetchall();
        foreach ($this->objetos as $objeto) {
            $contrasena_actual = $objeto->contrasena;
        }
        if(strpos($contrasena_actual,'$2y$10$')===0){
            if(password_verify($pass,$contrasena_actual)){
                $sql="UPDATE usuario SET estado=2, usuario_visibilidad=0 where id=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_borrado));
                echo 'borrado';
            }
            else{
                echo 'noborrado';
            }
            
        }
        else{
            if($pass==$contrasena_actual){
                $sql="UPDATE usuario SET estado=2, usuario_visibilidad=0 where id=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_borrado));
                echo 'borrado';
                
            }
            else{
                echo 'noborrado';
            }
            
        }
    }
}
?>