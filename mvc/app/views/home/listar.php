<h2 class="page-header">Lista de cursos</h2>

<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Posicion</th>
			<th>Visibilidad</th>
		</tr>
	</thead>
	<?php if (count($cursos) > 0): ?>
		<?php foreach ($cursos as $kcursos => $vcursos): ?>
			<tr>
				<td><?php echo '<a class="btn btn-primary" href="?a=curso&id='.$vcursos['idcursos'].'" title="">Editar</a>' ?></td>
				<td><?php echo $vcursos["nombre"]; ?></td>
				<td><?php echo $vcursos["posicion"]; ?></td>
				<td><?php echo $vcursos["visibilidad"]?"Visible":"Desactivado"; ?></td>
			</tr>
		<?php endforeach ?>
	<?php endif ?>

</table>