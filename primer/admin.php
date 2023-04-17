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
    <table border="2px" >
      <tr >
        <td>CI</td>
        <td>Usuario</td>
        <td>MODIFICAR</td>
        <td>ELIMINAR</td>
      </tr>
      <?php 
      require 'conexion2.php';
        $sql = "SELECT * from usuario ";
        $result = mysqli_query($conn,$sql);
        while ($mostrar = mysqli_fetch_array($result)) {
        
          ?>
          <tr>
            <td ><?php echo $mostrar['ci']?>&nbsp&nbsp</td>
            <td ><?php echo $mostrar['user']?>&nbsp&nbsp</td>
            <td><a href="">modificar</a></td>
            <td><a href="">eliminar</a></td>
          </tr>
          <?php 
         }
          ?>
    </table>
    <br>
        <a href="media.php"><input type="submit" value="AGERGAR Usuario"></a> <br> <br>
         <br>
          <br>

  </center>
</body>
</html>
<?php include("template/pie.php"); ?>