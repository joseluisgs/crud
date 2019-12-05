<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorAlumno
 *
 * @author link
 */

require_once MODEL_PATH."Alumno.php";
require_once CONTROLLER_PATH."ControladorBD.php";
require_once UTILITY_PATH."funciones.php";

class ControladorAlumno {

     // Variable instancia para Singleton
    static private $instancia = null;
    
    // constructor--> Private por el patrón Singleton
    private function __construct() {
        //echo "Conector creado";
    }
    
    /**
     * Patrón Singleton. Ontiene una instancia del Manejador de la BD
     * @return instancia de conexion
     */
    public static function getControlador() {
        if (self::$instancia == null) {
            self::$instancia = new ControladorAlumno();
        }
        return self::$instancia;
    }
    
    /**
     * Lista el alumnado según el nombre o dni
     * @param type $nombre
     * @param type $dni
     */
    public function listarAlumnos($nombre, $dni){
        // Creamos la conexión a la BD
        $lista=[];
        $bd = ControladorBD::getControlador();
        $bd->abrirBD();
        // creamos la consulta
        $consulta = "select * from alumnadocrud where nombre like '%".$nombre."%' or dni like '%".$dni."%'";
        $filas = $bd->consultarBD($consulta);
        if ($filas->num_rows > 0) {
            while ($fila = $filas->fetch_assoc()) {
                $alumno = new Alumno($fila['id'], $fila['dni'], $fila['nombre'], $fila['email'], $fila['password'], $fila['idioma'], $fila['matricula'], $fila['lenguaje'], $fila['fecha'], $fila['imagen']);
                // Lo añadimos
                $lista[] = $alumno;
            }
            $filas->free();
            $bd->cerrarBD();
            return $lista;
        }else{
            return null;
        }    
    }
    
    public function almacenarAlumno($dni, $nombre, $email, $password, $idioma, $matricula, $lenguaje, $fecha, $imagen){
        $alumno = new Alumno("",$dni, $nombre, $email, $password, $idioma, $matricula, $lenguaje, $fecha, $imagen);
        $bd = ControladorBD::getControlador();
        $bd->abrirBD();
        $consulta = "insert into alumnadocrud (dni, nombre, email, password, idioma, matricula, lenguaje, fecha, imagen) values 
        ('" . $alumno->getDni() . "','" . $alumno->getNombre() . "','" . $alumno->getEmail() . "','" . $alumno->getPassword() . "'," .
        "'" . $alumno->getIdioma() . "', '" . $alumno->getMatricula() . "','" . $alumno->getLenguaje() . "'," . 
        "'" . $alumno->getFecha() . "', '" . $alumno->getImagen() . "')";
        //echo ($consulta);
        $estado = $bd->actualizarBD($consulta);
        $bd->cerrarBD();
        return $estado;
    }
    
    public function buscarAlumno($id){ 
        $bd = ControladorBD::getControlador();
        $bd->abrirBD();
        $consulta = "select * from alumnadocrud  where id = ". $id;
        $filas = $bd->consultarBD($consulta);
        if ($filas->num_rows > 0) {
            while ($fila = $filas->fetch_assoc()) {
                $alumno = new Alumno($fila['id'], $fila['dni'], $fila['nombre'], $fila['email'], $fila['password'], $fila['idioma'], $fila['matricula'], $fila['lenguaje'], $fila['fecha'], $fila['imagen']);
                // Lo añadimos
            }
            $filas->free();
            $bd->cerrarBD();
            return $alumno;
        }else{
            return null;
        }    
    }

    public function buscarAlumnoDni($dni){ 
        $bd = ControladorBD::getControlador();
        $bd->abrirBD();
        $consulta = "select * from alumnadocrud where dni = '" . $dni . "'";
        //echo $consulta;
        $filas = $bd->consultarBD($consulta);
        if ($filas->num_rows > 0) {
            while ($fila = $filas->fetch_assoc()) {
                $alumno = new Alumno($fila['id'], $fila['dni'], $fila['nombre'], $fila['email'], $fila['password'], $fila['idioma'], $fila['matricula'], $fila['lenguaje'], $fila['fecha'], $fila['imagen']);
                // Lo añadimos
            }
            $filas->free();
            $bd->cerrarBD();
            return $alumno;
        }else{
            return null;
        }    
    }
    
    public function borrarAlumno($id){ 
        $bd = ControladorBD::getControlador();
        $bd->abrirBD();
        $consulta = "delete from alumnadocrud where id = ". $id;
        $estado= $bd->consultarBD($consulta);
        $bd->cerrarBD();
        return $estado;
    }
    
    public function actualizarAlumno($id, $dni, $nombre, $email, $password, $idioma, $matricula, $lenguaje, $fecha, $imagen){
        $alumno = new Alumno($id,$dni, $nombre, $email, $password, $idioma, $matricula, $lenguaje, $fecha, $imagen);
        $bd = ControladorBD::getControlador();
        $bd->abrirBD();
        $consulta = "update alumnadocrud set dni='". $alumno->getDni() ."',  
            nombre='".$alumno->getNombre()."', email='".$alumno->getEmail()."',  
            password='".$alumno->getPassword()."', idioma='".$alumno->getIdioma()."', 
            matricula='".$alumno->getMatricula()."', lenguaje='".$alumno->getLenguaje()."',  
            fecha='".$alumno->getFecha()."', imagen='".$alumno->getImagen()."'  
            where id= ".$alumno->getId();
        //echo ($consulta);
        $estado = $bd->actualizarBD($consulta);
        $bd->cerrarBD();
        return $estado;
    }
    
    
}
