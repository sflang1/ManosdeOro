<!DOCTYPE HTML>
<html>
	<head>
		<title>Formulario de autenticación</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
		Llene el siguiente formulario para autenticarse
		<form method="POST" action="../Logica/autenticar.php">
			<table>
				<tr>
					<td>
						Nombre de usuario:
					</td>
					<td>
						<input type="text" name="username">
					</td>
				</tr>
				<tr>
					<td>
						Contraseña:
					</td>
					<td>
						<input type="password" name="password">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Aceptar">
					</td>
				</tr>
			</table>
			¿Olvidaste tu contraseña? Haz click <a href="recuperarContrasena.php">aquí</a>
		</form>
	</body>
</html>