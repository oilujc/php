<h2 class="page-header"><?php echo $data["nombre"]?? "" ?></h2>

<table class="table table-striped">
	<tr>
		<th>#</th>
		<th>Nombre</th>
		<th>Contenido</th>
		<th>Posicion</th>
		<th>Visibilidad</th>
	</tr>
	<?php if (isset($caps)): ?>
		<?php foreach ($caps as $kdata => $kvalue): ?>
			<tr>
				<td><?php echo '<a href="?a=curso&id='.$data["idcursos"].'&cap='.$kvalue["idcapitulos"].'" class="btn btn-primary">Editar</a>'; ?></td>
				<td><?php echo $kvalue["nombre"]; ?></td>
				<td><?php echo $kvalue["contenido"]; ?></td>
				<td><?php echo $kvalue["posicion"]; ?></td>
				<td><?php echo $kvalue["visibilidad"]; ?></td>
			</tr>
		<?php endforeach ?>
	<?php endif ?>
</table>
<div class="col-xs-12">
	<form action="" class="">
		<div>
			<input type="hidden" name="idcapitulos" id="idcapitulos" value="">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" class="form-control">
		</div>
		<div>
			<label for="nombre">Descripcion</label>
			<textarea name="contenido" id="contenido" cols="30" rows="5" class="form-control"></textarea>
		</div>
		<div>
			<label for="nombre">Posicion</label>
			<input type="text" name="posicion" id="posicion" class="form-control">
		</div>
		<div>
			<label for="nombre">Visibilidad</label>
			<input type="text" name="visibilidad" id="visibilidad" class="form-control">
		</div>
		<div>
			<input type="submit" class="btn btn-primary" value="Editar">
		</div>
	</form>
</div>

