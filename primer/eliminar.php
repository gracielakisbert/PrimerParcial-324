<?php
	include "conexion2.php";
	$ci=$_POST["ci"];
	$sql="delete from usuario where ci = $ci";
	mysqli_query($conn,$sql);
?>

<br/>
<a href="admin.php">Volver</a>
