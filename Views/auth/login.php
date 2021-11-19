<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
//Declaramos la conexion con el servidor de base de datos
require_once('../../Controller/Conexion.php');

//Si no existe la sesion, redirigir al index
if( $user->is_logged_in() ){ header('Location: ../../index.php'); exit(); }

//Verifica el formulario
if(isset($_POST['submit'])){

	if (!isset($_POST['username'])) $error[] = "Por favor rellene el usuario";
	if (!isset($_POST['password'])) $error[] = "Por favor rellene la contraseña";

	$username = $_POST['username'];
	if ( $user->isValidUsername($username)){
		if (!isset($_POST['password'])){
			$error[] = 'Se debe ingresar una contraseña';
		}
		$password = $_POST['password'];

		if($user->login($username,$password)){
			$_SESSION['username'] = $username;
			header('Location: ../auth/memberpage.php');
			exit;

		} else {
			$error[] = 'Nombre de usuario o contraseña incorrectos o su cuenta no ha sido activada.';
		}
	}else{
		$error[] = 'Los nombres de usuario deben ser alfanuméricos y tener entre 3 y 16 caracteres de longitud.';
	}



}//end if submit

//define page title
$title = 'Login';

//include header template

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once '../../php/scripts/scriptsCSS.php';
    ?>
</head>
   
<body>
    <header class="bg-primary text-center">
        <?php
            include_once '../../php/header.php';
        ?>
        <h1>Encabezado</h1>
    </header>
<div class="container mt-5 p-2">

	<div class="row" style="width: 50%; margin: auto;">
		<form role="form" method="post" action="" autocomplete="off">
			<div class="text-center">
				<h2 class="text-white">Iniciar sesion</h2>
			</div>
			<hr>

			<?php
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				if(isset($_GET['action'])){

					//check the action
					switch ($_GET['action']) {
						case 'active':
							echo "<h2 class='bg-success'>Su cuenta ya está activa, ahora puede iniciar sesión.</h2>";
							break;
						case 'reset':
							echo "<h2 class='bg-success'>Por favor revise su bandeja de entrada para un enlace de restablecimiento.</h2>";
							break;
						case 'resetAccount':
							echo "<h2 class='bg-success'>Contraseña cambiada, ahora puede iniciar sesión.</h2>";
							break;
					}

				}
			?>
			<div class="mb-3">
				<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Usuario" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1">
			</div>

			<div class="mb-3">
				<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
			</div>
			
			<div class="mb-3">
				<a href='reset.php'>Recuperar contraseña?</a>
			</div>

			<hr>
			<div class="text-center">
				<input type="submit" name="submit" value="Iniciar Sesion" class="btn btn-primary btn-block" tabindex="5">
			</div>

			<!--<div class="form-group">
				<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Usuario" value="<?php if(isset($error)){ echo htmlspecialchars($_POST['username'], ENT_QUOTES); } ?>" tabindex="1">
			</div>

			<div class="form-group">
				<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
			</div>
			
			<div class="row">
				<div class="col-xs-9 col-sm-9 col-md-9">
						<a href='reset.php'>Recuperar contraseña?</a>
				</div>
			</div>-->
			
			
		</form>
	</div>
</div>
<?php
        include_once '../../php/footer.php';    
        include '../../php/scripts/scriptsJS.php';
    ?>    
</body>
</html>

