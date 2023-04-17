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
    <table border="3px" >
      <tr >
        <td bgcolor="#96EDF3 ">Departamento</td>
        <td bgcolor="#96C8EF ">MEDIA</td>
      </tr>
      <?php 
      require 'conexion2.php';
        $sql = "
      SELECT case p.depto 
                   when '01' then 'Chuquisaca'
                   when '02' then 'La Paz'
                   when '03' then 'Cochabamba'
                   when '04' then 'Oruro'
                   when '05' then 'Potosi'
                   when '06' then 'Tarija'
                   when '07' then 'Santa Cruz'
                   when '08' then 'Beni'
                   when '09' then 'Pando'
                     else 'OTRO' end depto, avg(i.notaF) as notaF from inscripcion i, persona p
              where p.ci = i.ci
            GROUP by case p.depto 
             when '01' then 'Chuquisaca'
             when '02' then 'La Paz'
             when '03' then 'Cochabamba'
             when '04' then 'Oruro'
             when '05' then 'Potosi'
             when '06' then 'Tarija'
             when '07' then 'Santa Cruz'
             when '08' then 'Beni'
             when '09' then 'Pando'
             else 'OTRO' end ";
                    $result = mysqli_query($conn,$sql);
                    while ($mostrar = mysqli_fetch_array($result)) {
                    
                      ?>
          <tr>

            <td bgcolor="#96EDF3 "><?php echo $mostrar['depto']?>&nbsp&nbsp</td>
            <td bgcolor="#96C8EF "><?php echo $mostrar['notaF']?>&nbsp&nbsp</td>
          </tr>
          <?php 
         }
          ?>
    </table>
    <br>
     <a href="director.php"><input type="submit" value="VOLVER"></a>
    <?php
    ?>
  </center>
</body>
</html>
<?php include("template/pie.php"); ?>