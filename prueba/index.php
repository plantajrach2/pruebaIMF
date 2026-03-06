<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabla de usuarios con AJAX</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">  -->
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="contenedor">
		<header>
			<h1>Lista de Tareas</h1>
			<div>
				<button id="btn_cargar_usuarios" class="btn active" style="display: none;">Cargar</button>
			</div>
		</header>
		<main>
			<form action="" method="" id="formulario" class="formulario">
	
	<div class="row g-2 align-items-center">

		<div class="col">
			<input type="text" 
				   name="nombre" 
				   id="nombre" 
				   class="form-control"
				   placeholder="Escriba el título de la tarea"
				   required>
		</div>

		<div class="col">
			<textarea name="descripcion" 
					  id="descripcion" 
					  class="form-control"
					  placeholder="Escriba la descripción de la tarea."
					  rows="1"></textarea>
		</div>

		<div class="col-auto">
			<input type="date" 
				   name="fecha_apertura" 
				   id="fecha_apertura" 
				   class="form-control"
				   placeholder="Fecha de apertura"
				   required>
		</div>

		<div class="col-auto">
			<input type="date" 
				   name="fecha_cierre" 
				   id="fecha_cierre" 
				   class="form-control"
				   placeholder="Fecha de cierre"
				   required>
		</div>

		<div class="col-auto">
			<div class="form-check">
				<label class="form-check-label" for="hecha">
					¿Completada?
				</label>
				<input class="form-check-input" 
					   type="checkbox" 
					   id="hecha" 
					   name="hecha" 
					   value="1">
			</div>
		</div>

		<div class="col-auto">
			<button type="submit" class="btn btn-primary">
				Agregar
			</button>
		</div>

	</div>

</form>
			<div class="error_box" id="error_box">
				<p>Se ha producido un error.</p>
			</div>
			<table id="tabla" class="table table-striped mx-auto">
				<tr>
					<th>ID</th>
					<th>Actividad</th>
					<th>Apertura</th>
					<th>Cierre</th>
					<th>Descripción</th>
					<th>Completada</th>
				</tr>
			</table>
			<div class="loader" id="loader"></div>
		</main>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
