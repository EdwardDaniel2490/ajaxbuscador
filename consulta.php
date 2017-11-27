<?php 
	include('conexion.php');
	$tabla = "";
	$query = "SELECT * FROM tbl_user ORDER BY id ";
	error_reporting(0);
	if(isset($_POST['alumnos']))
	{
		$q = $conexion->real_escape_string($_POST['alumnos']);
		$query = "SELECT * FROM tbl_user WHERE
			id LIKE '%".$q."%' OR
			username LIKE '%".$q."%' OR
			email LIKE '%".$q."%'";	
		
	}

	$buscar = $conexion->query($query);
	if($buscar->num_rows > 0)
	{
		$tabla.=
		'<table class="table">
			<tr class="bg-primary">
				<td>ID</td>
				<td>USERNAME</td>
				<td>EMAIL</td>
			</tr>';
		while($filaAlumnos=$buscar->fetch_row())
		{
			$tabla.=
				'<tr>
					<td>'.$filaAlumnos[0].'</td>
					<td>'.$filaAlumnos[2].'</td>
					<td>'.$filaAlumnos[3].'</td>				
				</tr>';
		}
		$tabla.= '</table>';
	}else{
		$tabla.= "no hay coincidencias";		
	}
	echo $tabla;
 ?>