<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabla de usuarios con AJAX</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet"> 
	<link rel="stylesheet" href="css/estilos.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
	<div class="contenedor">
		<header>
			<h1>Tabla de Actividades</h1>
			<div>
				<button id="btn_cargar_usuarios" class="btn active" style="display: none;">Cargar</button>
			</div>
		</header>
		<main>
			<form action="" method="" id="formulario" class="formulario">

				<input type="text" name="nombre" id="nombre" placeholder="Escriba el título de la actividad" required >
				<textarea name="descripcion" id="descripcion" placeholder="Escriba la descripción de la actividad." style="width: 3028px; height: 45px;"></textarea>
				<input type="date" name="fecha_apertura" id="fecha_apertura" placeholder="Fecha de apertura" required>
				<input type="date" name="fecha_cierre" id="fecha_cierre" placeholder="Fecha de cierre" required >
				
				<label for="hecha"> ¿Realizada?</label><br>
				<input type="checkbox" id="hecha" name="hecha" value="1">
				
				<button type="submit" class="btn">Agregar</button>
			</form>
			<div class="error_box" id="error_box">
				<p>Se ha producido un error.</p>
			</div>
			<table id="tabla" class="tabla">
				<tr>
					<th>ID</th>
					<th>Actividad</th>
					<th>Apertura</th>
					<th>Cierre</th>
					<th>Descripción</th>
					<th>Realizada</th>
				</tr>
			</table>
			<div class="loader" id="loader"></div>
		</main>
	</div>
	<script src="js/main.js"></script>
	<script>
		btn.addEventListener('click', cargarActividades());
				
		formulario.addEventListener('submit', function(e){
			agregarActividad(e);
		});
       // cargarActividades();
	</script>
</body>
</html>
