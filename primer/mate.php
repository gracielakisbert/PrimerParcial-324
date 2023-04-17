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
<html lang="en">
 
   <body background="ima/fondo.png" style="background-repeat:initial;">
   	<?php if(!empty($user)): ?>
    <br>Bienvenido <?= $user['user']; ?>

    <a href="cerrar.php">
      cerrar sesion

        <center> 
     
               <h1 class="sliderText1 color_3">Bienvenidos a la Carrera de  Matemática	</h1>

      </center>
       <?php endif?>
   </body>
</html>