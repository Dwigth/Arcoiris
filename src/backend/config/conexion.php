<?php

/*
  CREANDO LA CONEXION A LA BASE DE DATOS */

class ConexionMySQL {

    private static $servername = "localhost";
    private static $user = "centromu_admin";
    private static $password = "naruto9931198421";
    private static $database = "centromu_cfmadmin";
    private static $conexion = NULL;

    public static function Conexion() {
        if (!isset(ConexionMySQL::$conexion)) {
            ConexionMySQL::$conexion = (mysqli_connect(ConexionMySQL::$servername, ConexionMySQL::$user, ConexionMySQL::$password, ConexionMySQL::$database))
                    or die(mysqli_error());
        }

        return ConexionMySQL::$conexion;
    }

    public static function EjecutarConsulta($consulta) {
        $resultado = mysqli_query(ConexionMySQL::$conexion, $consulta);
        return $resultado;
    }

    public static function ObtenerDatos($consulta) {
        return mysqli_fetch_array($consulta);
    }

    public static function ObtenerNumeroRegistros($consulta) {
        return mysqli_num_rows($consulta);
    }

    public static function ObtenerSiguienteID($tabla, $campo) {
        $sql = "SELECT MAX($campo) AS id FROM $tabla";
        $resultado = ConexionMySQL::EjecutarConsulta($sql);
        $id = 0;

        if (ConexionMySQL::GetNumeroRegistros($resultado) > 0) {
            while ($fila = ConexionMySQL::GetFilaDatos($resultado)) {
                $id = $fila['id'] + 1;
            }
        } else {
            $id = 1;
        }

        return $id;
    }

}