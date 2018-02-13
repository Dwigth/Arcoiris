<?php

class CONFIG
{
  private static $server = '198.91.81.6';
  private static $username = 'arcoiri2';
  private static $pass = 'arcoiris123';
  private static $db_name = 'arcoiri2_arcoiris';

  public static function GET_CONNECTION(){
    $con = mysqli_connect(CONFIG::$server,CONFIG::$username,CONFIG::$pass,CONFIG::$db_name);
    if(mysqli_connect_errno()){
			echo mysqli_connect_error();
			exit(0);
		}
    return $con;
  }

public static function GET_SQL($sql){
  $response;
  $conn = CONFIG::GET_CONNECTION();
  $query = mysqli_query($conn,$sql);
  $responseArray = array();

  if ($query) {
    $responseArray = array();
			while ($fila = mysqli_fetch_assoc($query)) {
				$responseArray[] = array_map('utf8_encode', $fila);
			}
			$response = json_encode($responseArray, JSON_NUMERIC_CHECK);
  }else{
			$response = null;
			echo mysqli_error($conn);
		}

		mysqli_close($conn);
		return $response;
}

public static function PUT_SQL($sql){
      $response;
		  $conn = CONFIG::GET_CONNECTION();
		  $query = mysqli_query($conn,$sql);

		if ($query) {
			$array = true;
			$response = json_encode($array, JSON_NUMERIC_CHECK);
		}else{
			$array = false;
			$response = json_encode($array, JSON_NUMERIC_CHECK);
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
		return $response;
}

}


?>
