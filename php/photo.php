<?php
$dir='../imgs';
$dirSmall=$dir.'/small';
$file=$_FILES['archivo']['name'];
$tmp=$_FILES['archivo']['tmp_name'];
include "thumb.php";
if (isset($_POST['upload'])) {
	if (is_uploaded_file($tmp)) {
		if (!is_dir($dir)) {
			mkdir($dir);
		}
		$fullpath=$dir.'/'.$file;
		copy($tmp, $fullpath);
		list($filename,$ext)=explode('.', $file);
		$archivo=$filename.' (small)';
		// $miniatura=$dir.'/'.$archivo;
		if (!is_dir($dirSmall)) {
			mkdir($dirSmall);
		}
		// $ext=($ext=='jpg')? 'jpeg' : $ext;
		$newpath=$dirSmall.'/'.$filename;
		$thumb=new Thumb();
		$thumb->loadImage($fullpath);
		$thumb->resize(100,'width');
		$thumb->save($newpath);
		/*$thumb=new Thumb();
		$thumb->loadImage($fullpath);
		$thumb->resize(100,'width');
		$thumb->save($miniatura);*/
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyects</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link
	  rel="stylesheet"
	  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.css"
	/>
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/my_bs.css">
</head>
<body>
	<div class="contenedor">
		<div class="jumbotron text-dark">
			<h1 class="display-4">Foto</h1>
			<p class="lead">Muestra de la miniatura cargada</p>
		</div>
<?php
if ($file) {
	$ext = ($ext=='jpg') ? 'jpeg' : $ext;
?>
		<a href="<?php echo $fullpath; ?>" data-fancybox><img src="<? echo $newpath.'.'.$ext;?>" alt="image"></a>
<?
}else{
?>
		<div class="alert alert-warning">No hay imagen cargada</div>
<?
}
?>
		<p><a href="javascript:history.back()" class="btn btn-dark">Volver</a></p>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>
	<script>
		Fancybox.bind("[data-fancybox]", {
		  // Your custom options
		});
	</script>
</body>
</html>