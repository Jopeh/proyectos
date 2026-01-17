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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="../css/styles.css" type="" media=""/>
	<link rel="stylesheet" href="../css/my_bs.css" type="" media=""/>
</head>
<body>
	<div id="" class="contenedor">
<nav class="navbar bg-dark border-bottom border-body navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../">Proyects</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../"><i class="bi bi-house"></i> Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            JS
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../public/matematic.htm">Matemática</a></li>
            <li><a class="dropdown-item" href="../public/calc.htm">Calculadora</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../public/tateti.htm">Tateti</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
        	<a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">PHP</a>
        	<ul class="dropdown-menu">
        		<li><a class="dropdown-item" href="../php/matematic.php">Matemática</a></li>
        		<li><a class="dropdown-item" href="../php/calc.php">Calculadora</a></li>
        		<li><hr class="dropdown-divider"></li>
        		<li><a class="dropdown-item" href="../php/compras.php">Compras</a></li>
        		<li><a class="dropdown-item" href="../php/miniatura.php">Miniatura</a></li>
        	</ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
		<div id="" class="jumbotron text-dark">
			<h1 class="display-4">Compras</h1>
			<p class="lead">Carga del listado</p>
		</div>
		<form method="post" action="buys.php" enctype="multipart/form-data" class="row row-cols-lg-auto g-3 align-items-center">
			<div id="" class="col-12">
				<label for="" class="visually-hidden">Archivo</label>
				<input type="file" id="archivo" name="archivo" accept=".csv" value="" class="form-control"/>
			</div>
			<div id="" class="col-12">
				<button name="upload" type="submit" value="val" class="btn btn-primary">Subir</button>
				<button name="" type="reset" value="val" class="btn btn-light">Restablecer</button>
			</div>
		</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
