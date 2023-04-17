<?php 
include("template/cabecera.php"); 

   session_start();

 if (isset($_SESSION['user_id'])) {
    header('Location: /html');
  }
  require 'conexion.php';

  if (!empty($_POST['user']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT  ci,user, password FROM usuario WHERE user = :user');
    $records->bindParam(':user', $_POST['user']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && $_POST['password']= $results['password'] ) {//falta la verificacion de la contraseña  password_verify($_POST['password'], $results['password'])
      $_SESSION['user_id'] = $results['user'];
      header('Location: /primer ');
      
    } else {
      $message = 'Lo sentimos, esas credenciales no coinciden';
    }
  }
  
?>


<hml>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
      </head>
      <body>
          <h1 style="text-align:center">Iniciar Sesion</h1>


          <form action="iniciosesion.php" method="POST" style="text-align:center">
            <input name="user" type="text" placeholder="alambrito"><br><br>
            <input name="password" type="password" placeholder="Contraseña"><br><br>  
            <input type="submit" value="Aceptar">
            <?php if(!empty($message)): ?>
             <p> <?= $message ?></p>
            <?php endif; ?>
          </form>
          
      </body>
</hml>
<?php include("template/pie.php"); ?>