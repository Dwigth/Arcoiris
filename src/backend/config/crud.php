<?php
	Header('Access-Control-Allow-Origin: *');
	include 'config.php';
  $con = new CONFIG();

class FUNCTIONS
{
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


	$opcion = $_GET["opcion"];
	switch ($opcion) {
		case '1':
			$sql = "SELECT * FROM comprador WHERE estado = 1 ORDER BY fecha_registro";
			echo $conn->GET_SQL($sql);
			break;
		case '2':
			$id = $_GET["id"];
			$sql = "SELECT * FROM productos WHERE idproducto = $id";
			echo getSQL($sql);
			break;
		case '3':
			$pro_descripcion = utf8_decode($_POST["pro_descripcion"]);
			$pro_unidad = $_POST["pro_unidad"];
			$pro_marca = utf8_decode($_POST["pro_marca"]);
			$pro_observaciones = utf8_decode($_POST["pro_observaciones"]);
			$pro_pcompra = $_POST["pro_pcompra"];
			$pro_pventa = $_POST["pro_pventa"];
			$pro_fcompra = $_POST["pro_fcompra"];
			if ($pro_fcompra == "null") {
				$sql = "INSERT INTO productos VALUES(null, '$pro_descripcion', $pro_unidad, '$pro_marca', null, $pro_pcompra, $pro_pventa, '$pro_observaciones', 1, NOW(), null)";
			}else{
				$sql = "INSERT INTO productos VALUES(null, '$pro_descripcion', $pro_unidad, '$pro_marca', '$pro_fcompra', $pro_pcompra, $pro_pventa, '$pro_observaciones', 1, NOW(), null)";
			}
			echo $conn->PUT_SQL($sql);
			//echo $sql;
			break;
		case '4':
			$idsel = $_POST["idsel"];
			$pro_descripcion = strtolower(utf8_decode($_POST["pro_descripcion"]));
			$pro_unidad = $_POST["pro_unidad"];
			$pro_marca = utf8_decode($_POST["pro_marca"]);
			$pro_observaciones = utf8_decode($_POST["pro_observaciones"]);
			$pro_pcompra = $_POST["pro_pcompra"];
			$pro_pventa = $_POST["pro_pventa"];
			$pro_fcompra = $_POST["pro_fcompra"];
			if ($pro_fcompra == "null") {
				$sql = "UPDATE productos SET pro_descripcion = '$pro_descripcion', pro_unidad = '$pro_unidad', pro_marca = '$pro_marca', pro_observaciones = '$pro_observaciones', pro_pcompra = $pro_pcompra, pro_pventa = $pro_pventa, pro_fcompra = null, modificacion = NOW() WHERE idproducto = $idsel";
			}else{
				$sql = "UPDATE productos SET pro_descripcion = '$pro_descripcion', pro_unidad = '$pro_unidad', pro_marca = '$pro_marca', pro_observaciones = '$pro_observaciones', pro_pcompra = $pro_pcompra, pro_pventa = $pro_pventa, pro_fcompra = '$pro_fcompra', modificacion = NOW() WHERE idproducto = $idsel";
			}
			//echo $sql;
			echo $conn->PUT_SQL($sql);
			break;
		case '5':
			$idsel = $_GET["id"];
			$sql = "UPDATE productos SET vigencia = 0, modificacion = NOW() WHERE idproducto = $idsel";
			//echo $sql;
			echo $conn->PUT_SQL($sql);
			break;
		default:
			# code...
			break;
	}
?>
