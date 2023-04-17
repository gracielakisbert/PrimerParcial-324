<?php include("template/cabecera.php"); 

session_start();

require 'conexion.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT ci,user, password FROM usuario WHERE user = :user');
  $records->bindParam(':user', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $dire = "DIRECTOR";
  $admin = "adminG";
  $user = null;


  if (count($results) > 0) {
    $user = $results;
    if ($user['user'] == $dire) {
      header('Location: director.php');
      exit(0);
    }
    if ($user['user'] == $admin) {
      header('Location: admin.php');
      exit(0);
    }
  }
}
?>

<!DOCTYPE html>
<html>
<body  background="ima/fondo.png" style="background-repeat:initial;">
  <?php if(!empty($user)): ?>
    Bienvenido <?= $user['user']; ?>
    <a href="cerrar.php">
      cerrar sesion
    </a> <center> 
         <div class="cuadrado">

                 <h1 class="sliderText1">  INFORMÁTICA</h1>
                 <a class="sliderText3" href="info.php">Ir a Informatica</a>
          
              <br>
               <br>
            
               <h1 class="sliderText1 color_2">FÍSICA</h1>
               <a class="sliderText3" href="fisica.php">Ir a Fisica</a>
            
            <br>
             <br>
            
               <h1 class="sliderText1 color_3">MATEMÁTICA</h1>
               <a class="sliderText3" href="mate.php">Ir a Matematica</a>
            
         </div>
      </center>
  <?php else: ?>
    <center> <h1>Debe Iniciar sesion</h1>

   
    <a href="iniciosesion.php">Iniciar Sesion</a>
  </center>
  <?php endif; ?>
</body>
</html>
<?php include("template/pie.php"); ?>