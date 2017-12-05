<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cliente API Rest</title>
	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" type="text/css" href="src/bower_components/tether/dist/css/tether.min.css">
	<link rel="stylesheet" type="text/css" href="src/bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>
<body>
	<div class="container">
		<h1>Cliente WEB API Rest Slim</h1>
			
		<div class="row">
			<div class="col-7">
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th>ID</th>
							<th>NOMBRE</th>
							<th>DESCRIPCION</th>
							<th>PRECIO</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
			<div class="col-5 float-right">
				<form id="form" class="form-control" action="http://localhost/slimf/api.php/productos" method="post" accept-charset="utf-8" data-producto = "0">
					<div>
						<input type="hidden" name="id" id="id">
						<label class="font-weight-bold" for="">Nombre: </label>
						<input type="text" id="nombre" class="form-control" name="nombre">
					</div>
					<div>
						<label class="font-weight-bold" for="">Descripcion: </label>
						<textarea name="descripcion" id="descripcion" class="form-control"></textarea>
					</div>
					<div>
						<label class="font-weight-bold" for="">Precio: </label>
						<input type="text" id="precio" class="form-control" name="precio">
					</div>
					<div class="my-2 text-center">
						<input type="submit" value="Enviar" class="btn btn-primary" name="">
					</div>
				</form>	
			</div>
		</div>
		
	</div>
	<!-- BOOTSTRAP SCRIPTS -->
	<script type="text/javascript" src="src/bower_components/jquery/dist/jquery.js"></script>
	<script type="text/javascript" src="src/bower_components/tether/dist/js/tether.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script type="text/javascript" src="src/bower_components/bootstrap/dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//limpiar
			function limpiar(){
				$("#form").attr("data-producto", "0");
				$("#id").val("");
				$("#nombre").val("");
				$("#descripcion").val("");
				$("#precio").val("");
			}
			//Listar
			function getProductos(){
				$.ajax({
					url: "http://localhost/slimf/api.php/productos",
					type: "GET",
					success: function(response){
						$.each(JSON.parse(response), function(i, index){
							if (index != null) {
								if(index.id.length){
									$(".table").append('<tr><td>' + index.id + '</td>'+
														'<td>' + index.nombre + '</td>'+
														'<td>' + index.descripcion + '</td>'+
														'<td>' + index.precio + '</td>'+
														'<td><button type="" class="edit btn btn-primary" data-producto="'+index.id+'">Editar</button><button type="" class="delete btn btn-danger" data-producto="'+index.id+'">Borrar</button></td>'+
														 '</tr>');
								}
							}
						});
						//BORRAR
						$(".delete").unbind('click').click(function(){
							$.ajax({
								url: "http://localhost/slimf/api.php/productos/"+$(this).data("producto"),
								type: "DELETE",
								success: function(response){
									$(".table").html("<thead><tr><th>ID</th><th>NOMBRE</th><th>DESCRIPCION</th><th>PRECIO</th><th>#</th></tr></thead>");
									getProductos();

									
									limpiar();
								}
							});
						});
						//EDITAR
						$(".edit").unbind('click').click(function(){
							$.ajax({
								url: "http://localhost/slimf/api.php/productos/"+$(this).data("producto"),
								type: "GET",
								success: function(response){
									var data = JSON.parse(response);
									$(".table").html("<thead><tr><th>ID</th><th>NOMBRE</th><th>DESCRIPCION</th><th>PRECIO</th><th>#</th></tr></thead>");
									getProductos();
									$("#id").val(data.id);
									$("#nombre").val(data.nombre);
									$("#descripcion").val(data.descripcion);
									$("#precio").val(data.precio);
									
								}
							});
						});
					}
				});
			}

			getProductos();

			//Guardar
			if ($("#form").data("producto") === 0) {
				$("#form").submit(function(e){
					e.preventDefault();
					var form = $("#form");
					var formData = new FormData(form[0]);
					$.ajax({
						url: "http://localhost/slimf/api.php/productos",
						type: "POST",
						data: formData,
						contentType: false,
						processData: false,
						success: function(response){
							$(".table").html("<thead><tr><th>ID</th><th>NOMBRE</th><th>DESCRIPCION</th><th>PRECIO</th><th>#</th></tr></thead>");
							getProductos();
							limpiar();
						}
					});
					return false;
				});
			}

		});
	</script>
	
</body>
</html>