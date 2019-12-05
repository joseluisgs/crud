<?php

/**
 * Description of ConectorBD
 * V. 1.1
 * @author link
 */

/**
 * Conector BD usando objetos MySQLi
 */
class ControladorBD {
    
    // Configuración del servidor
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "CRUD";
    
    // Variables
    private $bd; // Relativo a la conexion de la base de datos
    private $rs; // ResultSet donde se almacena las consultas
    
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
            self::$instancia = new ControladorBD();
        }
        return self::$instancia;
    }

    /**
     * Abre la conexión a la BD
     */
    public function abrirBD() {
        $this->bd = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->bd->connect_error) {
            die("conexión fallida " . $this->bd->connect_error);
        }
        //echo "BD abierta";
    }

    /**
     * Cierra la conexión y el manejador de la BD
     */
    public function cerrarBD() {
        $this->bd->close();
        $this->bd = null;
        $this->rs = null;
        //echo "BD cerrada";
    }
    
    /**
     * Actualiza la BD a través de una consulta
     * @param type $consulta
     * @return boolean
     */
    public function actualizarBD($consulta) {
        if ($this->bd->query($consulta) === TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /**
     * REaliza una consulta a la BD
     * @param type $consulta
     * @return type ResultSet
     */
    public function consultarBD($consulta) {
        if($this->rs = $this->bd->query($consulta)){
            return $this->rs;
        }else{
            echo "ERROR: No se puede ejecutar consulta $consulta. " . $this->bd->error;
        }
    }
    
    /**
     * Devuelve los datos de conexion
     * @return type
     */
    public function datosConexion() {
        return $this->servername;
    }
    
    private function alerta($texto) {
    echo '<script type="text/javascript">alert("' . $texto . '")</script>';
    }
}

