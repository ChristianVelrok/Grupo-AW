<?php 

require_once __DIR__.'/config.php';

function addCommentContent($id_user, $mensaje, $id_content){
	global $BD;


	$query="INSERT INTO comments (id_user, texto) VALUES ('".$BD->real_escape_string($id_user)."','".$BD->real_escape_string($mensaje)."')";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		//$resultado->close();
		$id_comment = $BD->insert_id;
		$query2="INSERT INTO comments_content (id_content, id_comment) VALUES ('".$BD->real_escape_string($id_content)."','".$BD->real_escape_string($id_comment)."')";
		if($resultado = $BD->query($query2)) {
			$exito = true;
			cierraConsultas();		
		}
	}

	return $exito;

}

function addCommentMercha($id_user, $mensaje, $id_merchandising){
	global $BD;


	$query="INSERT INTO comments (id_user, texto) VALUES ('".$BD->real_escape_string($id_user)."','".$BD->real_escape_string($mensaje)."')";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		
		$id_comment = $BD->insert_id;
		$query2="INSERT INTO comments_merchandising (id_merchansing, id_comment) VALUES ('".$BD->real_escape_string($id_merchandising)."','".$BD->real_escape_string($id_comment)."')";
		if($resultado = $BD->query($query2)) {
			$exito = true;
						
		}
	}
	cierraConsultas();
	return $exito;

}

function delComment($id_comment){
	global $BD;


	$query="DELETE FROM comments WHERE id_comment='".$BD->real_escape_string($id_comment)."'";

	$exito = false;

	if ($resultado = $BD->query($query)) {
		$exito = true;
		
	}
	cierraConsultas();
	return $exito;

}

/*function editComment($id_comment, $mensaje){
	global $BD;


	$query="UPDATE comments set texto='".$BD->real_escape_string($mensaje)."' WHERE id_comment='".$BD->real_escape_string($id_comment)."'";
	
	$exito = false;

	if ($resultado = $BD->query($query)) {
		$resultado->close();
	}

	return $exito;

}*/

function dameComment($id_comment){

  global $BD;	
  $query = "SELECT * FROM comments WHERE id_comment='".$BD->real_escape_string($id_comment)."'";
  $mercha = false;
  if ($resultado = $BD->query($query)) {
    $mercha = $resultado->fetch_assoc();
    $resultado->close();
  }
  cierraConsultas();
  return $mercha;
}

function dameCommentsContent($id_content){

  global $BD;	
  $query = "SELECT id_comment FROM comments_content WHERE id_content='".$BD->real_escape_string($id_content)."'";
	
  $array1 = array();
  $array2 = array();
  if ($resultado = $BD->query($query)) {
    
    $h = 0;
	
    while($arr = $resultado->fetch_array()) {
		$array1[$h++] = $arr["id_comment"];
	}
	$h = 0;
	foreach($array1 as $id_comment) {
	$query2 = "SELECT * FROM comments WHERE id_comment='".$BD->real_escape_string($id_comment)."'";
	$result2 = $BD->query($query2);
		while($comentarios = $result2->fetch_assoc()) {
			$array2[$h++] = $comentarios;
		}
	}
    
  }
  cierraConsultas();
  return $array2;
}

function dameCommentsMercha($id_mercha){

  global $BD;	
  $query = "SELECT id_comment FROM comments_merchandising WHERE id_merchansing	='".$BD->real_escape_string($id_mercha)."'";
	
  $array1 = array();
  $array2 = array();
  if ($resultado = $BD->query($query)) {
    
    $h = 0;
	
    while($arr = $resultado->fetch_array()) {
		$array1[$h++] = $arr["id_comment"];
	}
	$h = 0;
	foreach($array1 as $id_comment) {
	$query2 = "SELECT * FROM comments WHERE id_comment='".$BD->real_escape_string($id_comment)."'";
	$result2 = $BD->query($query2);
		while($comentarios = $result2->fetch_assoc()) {
			$array2[$h++] = $comentarios;
		}
	}
    
  }
  cierraConsultas();
  return $array2;
}

?>
