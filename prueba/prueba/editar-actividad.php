<?php 
    $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">  -->
	<link rel="stylesheet" href="css/estilos.css">
    <title>Personal <?php echo $_GET['id'];?></title>
</head>
<body>
    <main>
    <h3>Editar personal</h3>
    <form action="" method="" id="formularioeditar" class="formulario">
        <input value="" type="hidden" id="id_actividad" name="id_actividad">

        <input value="" type="text" name="nombre" id="nombre" placeholder="Nombre">
        <textarea id="descripcion" name="descripcion" placeholder="Descripción" style="width: 3028px; height: 45px;"></textarea>
		<input type="date" name="fecha_apertura" id="fecha_apertura">
        <input type="date" name="fecha_cierre" id="fecha_cierre">

        <label for="hecha"> ¿Realizada?</label><br>
		<input type="checkbox" id="hecha" name="hecha" value="1">

        <button type="submit" class="btn">Editar</button>
        <button id='eliminar' class='btndanger' onclick='eliminarActividad(<?php echo $_GET["id"]; ?> );'>eliminar</button>
    </form>
<div class="loader" id="loader"></div>
</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="js/main.js"></script>
    <script>
        getActividad(<?php echo $_GET['id'];?>);

        formularioeditar.addEventListener('submit', function(e){
            editarActividad(e);
        });
    </script>
    
</body>
</html>