<?php
include "conexion.php";
$file=$_FILES['archivo']['name'];
$tmp=$_FILES['archivo']['tmp_name'];
if ( is_uploaded_file($tmp) )
{
	$dir='../uploads/';
	if ( ! is_dir($dir) )
	{
		mkdir($dir);
	}
	$fullpath=$dir.$file;
	copy($tmp,$fullpath);
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<title>Proyects</title>
	<meta name="generator" content="EverEdit" />
	<meta name="author" content="" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../css/styles.css" type="" media=""/>
	<link rel="stylesheet" href="../css/my_bs.css" type="" media=""/>
	<link rel="stylesheet" href="../css/buys.css">
</head>
<body>
	<div id="" class="contenedor">
		<div id="" class="jumbotron text-dark">
			<h1 class="display-4">Compras</h1>
			<p class="lead">Listado</p>
		</div>
<?php
if ($file) {
	$fp_in=fopen($fullpath, 'r');
	$lines=0;
	while (($fields=fgetcsv($fp_in,1000,';'))) {
	    $lines++;
	    if ($lines>1) {
	    	$detalle=$fields[0];
	    	$sql="SELECT Count(*) FROM productos WHERE producto='$detalle'";
	    	$res=$conn->query($sql);
	    	$cantidad=$fields[1];
	    	$precio=$fields[2];
	    	if ($res->fetchColumn()==0) {
	    		$sql="INSERT INTO productos (producto) VALUES (:product)";
	    		$sth=$conn->prepare($sql);
	    		$sth->execute([':product'=>$detalle]);
	    		/*$sql="SELECT * FROM productos WHERE producto='$detalle'";
	    		foreach($conn->query($sql) as $row){
	    			$idprod=$row['idproducto'];
	    		}
	    		$sql="INSERT INTO compras (idproducto,cantidad,precio) VALUES (:idproduct,:cant,:precio)";
	    		$sth=$conn->prepare($sql);
	    		$sth->execute([':idproduct'=>$idprod,':cant'=>$cantidad,':precio'=>$precio]);*/
	    	}else{
	    		$sql="SELECT * FROM productos WHERE producto='$detalle'";
	    		foreach($conn->query($sql) as $row){
	    			$idprod=$row['idproducto'];
	    		}
	    		$sql="INSERT INTO compras (idproducto,cantidad,precio) VALUES (:idproduct,:cant,:precio)";
	    		$sth=$conn->prepare($sql);
	    		$sth->execute([':idproduct'=>$idprod,':cant'=>$cantidad,':precio'=>$precio]);
	    	}
	    }
	}
	fclose($fp_in);
	$data=[];
	$sql="SELECT *,(compras.cantidad*compras.precio) AS Subtotal FROM compras INNER JOIN productos ON compras.idproducto=productos.idproducto";
	foreach ($conn->query($sql) as $row) {
	    $data[]=$row;
	}
	$fp_out=fopen($dir.'buys.json', 'w');
	fwrite($fp_out, json_encode($data,JSON_NUMERIC_CHECK));
	fclose($fp_out);
?>
		<div id="box">
			<h1 id="title">Lista de compras</h1>
			<div id="btn_cl" class="btn btn-primary">Cargar lista</div>
		</div>
		<div id="box_filter" class="fuera">
			<div class="input-group flex-nowrap">
				<span class="input-group-text" id="addon-wrapping">
					<i class="fa-solid fa-magnifying-glass"></i>
				</span>
				<input type="text" class="form-control" id="filter">
			</div>
		</div>
		<div id="app"></div>
<?
}else{
?>
		<div class="alert alert-warning">No hay un archivo cargado</div>
<?
}
?>
		<a href="javascript:history.back()" class="btn btn-dark">Volver</a>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
	<script src="../js/buys.js"></script>
</body>
</html>
