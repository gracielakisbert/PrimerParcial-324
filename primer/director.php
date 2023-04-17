<?php include("template/cabecera.php"); 

session_start();

require 'conexion.php';


if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT ci,user, password FROM usuario WHERE user = :user');
  $records->bindParam(':user', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = null;

  if (count($results) > 0) {
    $user = $results;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>FCPN</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">

</head>
<body  background="ima/fondo.png" style="background-repeat:initial;">
  <?php if(!empty($user)): ?>
  <br>Bienvenido <?= $user['user']; ?>
  <a href="cerrar.php">cerrar sesion</a> 
<?php endif; ?>
  <center> 
   
    <h3>LISTA ESTUDIANTES</h3>

      <table border="2px" >
      <tr bgcolor="#A7EE69">
        <td>CI</td>
        <td>Apellido y Nombre</td>
        <td>Fecha de Nacimiento</td>
        <td>Telefono</td>
        <td>Departamento</td>
      </tr>
      <?php 
      require 'conexion2.php';
        $sql = "SELECT * from persona  where id_rol=2";
        $result = mysqli_query($conn,$sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        
          ?>
          <tr>
            <td bgcolor="#67BEE1"><?php echo $mostrar['ci']?>&nbsp&nbsp</td>
            <td bgcolor="#A7EE69"><?php echo $mostrar['nombre_com']?>&nbsp&nbsp</td>
            <td bgcolor="#67BEE1"><?php echo $mostrar['fecha_nac']?>&nbsp&nbsp</td>
            <td bgcolor="#A7EE69" ><?php echo $mostrar['telefono']?>&nbsp&nbsp</td>
            <td bgcolor="#67BEE1"><?php echo $mostrar['depto']?>&nbsp&nbsp</td>
          </tr>
          <?php 
         }
          ?>
    </table>
        <br>
    <a href="media.php"><input type="submit" value="MEDIA"></a>

  </center>
</body>
</html>
<?php include("template/pie.php"); ?>