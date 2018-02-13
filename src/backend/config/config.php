<?php

class CONFIG
{
  private static $servername = '198.91.81.6';
  private static $user = 'arcoiri2';
  private static $password = 'arcoiris123';
  private static $database = 'arcoiri2_arcoiris';
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



}


?>
