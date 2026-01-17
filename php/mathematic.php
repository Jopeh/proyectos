<?php
include "mathematics.php";
if (isset($_POST['calc'])) {
	$number=$_POST['number'];
	if (is_numeric($number)) {
?>
<table class="table table-dark table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>Número</th>
			<th>Cuadrado</th>
			<th>Factorial</th>
		</tr>
	</thead>
	<tbody>
<?php
		for ($i = 0; $i <= $number; ++$i) {
?>
		<tr>
			<td align="right"><?php echo $i; ?></td>
			<td align="right"><?php echo sqr($i); ?></td>
			<td align="right"><?php echo factorial($i); ?></td>
		</tr>
<?
		}
?>
	</tbody>
</table>
<?
	}
}
?>