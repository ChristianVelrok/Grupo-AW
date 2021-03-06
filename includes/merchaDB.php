<?php

function dameIDMercha($nombre){
	global $BD;	
	$mercha = false;

	$query="SELECT id_merchandising
			FROM merchandising
			WHERE nombre='".$BD->real_escape_string($nombre)."'";

	if ($resultado = $BD->query($query)) {

		   	if($resultado->num_rows ==0)
	  			$mercha =false;
	  		else
	  			$mercha = $resultado->fetch_assoc()['id_merchandising'];

	    cierraConsultas();
	  }

	  return $mercha;
}


function addMercha($nombre, $foto1, $foto2, $descripcion, $unidades, $proveedor, $precio, $valoracion, $id_content){
	global $BD;


	$query="INSERT INTO merchandising (nombre, foto1, foto2, descripcion, unidades, proveedor, precio, valoracion)
			VALUES ('$nombre','$foto1','$foto2','$descripcion','$unidades','$proveedor','$precio','$valoracion')";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		$id_mercha = $BD->insert_id;
		addContentAssoc($id_mercha, $id_content);
		
		cierraConsultas();
	}

	return $exito;

}

function addContentAssoc($id_mercha, $id_content) {
	global $BD;
	
	if($id_content != NULL) {
		foreach($id_content as $id) {
			$query="INSERT INTO content_merchandising (id_content, id_merchandising)
						VALUES ('$id','$id_mercha')";
			$resultado = $BD->query($query);
			cierraConsultas();
		}
	}
}

function deleteContentAssoc($id_mercha, $id_content){

	global $BD;

	if($id_content != NULL) {
		foreach($id_content as $id) {
			$query="DELETE FROM content_merchandising WHERE id_content='$id' and id_merchandising= '$id_mercha'";
			$resultado = $BD->query($query);
			cierraConsultas();
		}
	}
}

function deleteMercha($id_merchandising){
	global $BD;

	$query="DELETE FROM merchandising
			WHERE id_merchandising ='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		cierraConsultas();
	}

	return $exito;
}


function dameMercha($id_merchandising){

  global $BD;	
  $query = "SELECT * FROM merchandising WHERE id_merchandising=$id_merchandising";
  $mercha = false;
  if ($resultado = $BD->query($query)) {
    $mercha = $resultado->fetch_assoc();
    cierraConsultas();
  }
  
  return $mercha;
}

function dameMerchasById_content($id_content){

		 global $BD;	
	  $query = "SELECT id_merchandising FROM content_merchandising WHERE id_content='".$BD->real_escape_string($id_content)."'";
		
	  $array1 = array();
	  $array2 = array();
	  if ($resultado = $BD->query($query)) {
		
		$h = 0;
		
		while($arr = $resultado->fetch_array()) {
			$array1[$h++] = $arr["id_merchandising"];
		}
		$h = 0;
		foreach($array1 as $id_merchandising) {
		$query2 = "SELECT * FROM merchandising WHERE id_merchandising='".$BD->real_escape_string($id_merchandising)."'";
		$result2 = $BD->query($query2);
			while($mercha = $result2->fetch_assoc()) {
				$array2[$h++] = $mercha;
			}
		}
		cierraConsultas();
	  }
	  
	  return $array2;
}

function dameMerchasById_Mercha($id_mercha){

		 global $BD;	
	  $query = "SELECT id_content FROM content_merchandising WHERE id_merchandising='".$BD->real_escape_string($id_mercha)."'";
		
	  $array1 = array();
	  $array2 = array();
	  if ($resultado = $BD->query($query)) {
		
		$h = 0;
		
		while($arr = $resultado->fetch_array()) {
			$array1[$h++] = $arr["id_content"];
		}
		$h = 0;
		foreach($array1 as $id_content) {
		$query2 = "SELECT * FROM content WHERE id_content='".$BD->real_escape_string($id_content)."'";
		$result2 = $BD->query($query2);
			while($mercha = $result2->fetch_assoc()) {
				$array2[$h++] = $mercha;
			}
		}
		cierraConsultas();
	  }
	  
	  return $array2;
}




function dameMerchas(){

global $BD;	
		
		$query = "SELECT * from merchandising";

		$content = false;
		$i = 0;
		if ($resultado = $BD->query($query)) {
			while($array = $resultado->fetch_assoc()) {
				$content[$i++] = $array;
			}
			cierraConsultas();
		}
		  
		return $content;


}




function modifyMerchanombre($id_merchandising, $newname){
	global $BD;

	$query="UPDATE merchandising
			set nombre ='$newname'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		cierraConsultas();
	}

	return $exito;

}

function modifyMerchafoto($id_merchandising, $newfoto, $foto){
	global $BD;

	$query="UPDATE merchandising
			set $foto='$newfoto'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		cierraConsultas();
	}

	return $exito;
}

function modifyMerchadescripcion($id_merchandising, $newdescripcion){
	global $BD;

	$query="UPDATE merchandising
			set descripcion='$newdescripcion'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		cierraConsultas();
	}

	return $exito;
}

function modifyMerchaunidades($id_merchandising, $newunidades){
	global $BD;

	$query="UPDATE merchandising
			set unidades='$newunidades'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		cierraConsultas();
	}

	return $exito;

}

function modifyMerchaproveedor($id_merchandising, $newproveedor){
	global $BD;

	$query="UPDATE merchandising
			set proveedor='$newproveedor'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		cierraConsultas();
	}

	return $exito;


}

function modifyMerchaprecio($id_merchandising, $newprecio){

	global $BD;

	$query="UPDATE merchandising
			set precio='$newprecio'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		cierraConsultas();
	}

	return $exito;

}

function modifyMerchavaloracion($id_merchandising, $newvaloracion){
	global $BD;

	$query="UPDATE merchandising
			set valoracion='$newvaloracion'
			WHERE id_merchandising='".$id_merchandising."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		cierraConsultas();
	}

	return $exito;

}

function searchMercha($busqueda){

		global $BD;	
		
		$query = "SELECT * 
				FROM merchandising 
				WHERE nombre LIKE '%".$busqueda."%'
					OR descripcion LIKE '%".$busqueda."%'
					OR proveedor LIKE '%".$busqueda."%'";

		$exito = false;

		$contenido = array();
		$i = 0;
		if($resultado = $BD->query($query)) {
			while($content = $resultado->fetch_assoc()) {
				$contenido[$i] = array();
				$contenido[$i++]= $content;
				cierraConsultas();
			}
		}

		return $contenido;

}

function dameFilasMercha($search){

	global $BD;	

	$query = "SELECT * 
				FROM merchandising 
				WHERE nombre LIKE '%".$search."%'
					OR descripcion LIKE '%".$search."%'
					OR proveedor LIKE '%".$search."%'";

	$exito = false;

	$exito = $BD->query($query);
	cierraConsultas();
	return $exito->num_rows;
	}


?>