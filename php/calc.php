<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyects</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="../css/my_bs.css">
	<link rel="stylesheet" href="../css/calc.css">
</head>
<body>
	<div class="contenedor">
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
		<div class="jumbotron text-dark">
			<h1 class="dipslay-4">Calculadora</h1>
			<p class="lead">Operaciones matemáticas</p>
		</div>
		<div class="row">
			<div class="col-md-4">
				<form id="FrmCalc" method="post" action="calculator.php">
					<div class="mb-3">
						<label for="numero1" class="form-label">Número 1</label>
						<input type="text" id="numero1" name="numero1" class="form-control" value="0">
					</div>
					<div class="mb-3">
						<label for="numero2" class="form-label">Número 2</label>
						<input type="text" id="numero2" name="numero2" class="form-control" value="0">
					</div>
					<input type="radio" class="btn-check" name="oper" id="suma" value="+" checked>
					<label class="btn btn-secondary" for="suma" title="Suma" data-bs-toggle="tooltip" data-bs-placement="top"><i class="bi bi-plus"></i></label>
					<input type="radio" class="btn-check" name="oper" id="resta" value="-">
					<label class="btn btn-secondary" for="resta" title="Resta" data-bs-toggle="tooltip" data-bs-placement="top"><i class="bi bi-dash"></i></label>
					<input type="radio" class="btn-check" name="oper" id="mult" value="*">
					<label class="btn btn-secondary" for="mult" title="Multiplicación" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa-solid fa-xmark"></i></label>
					<input type="radio" class="btn-check" name="oper" id="div" value="/">
					<label class="btn btn-secondary" for="div" title="División" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa-solid fa-divide"></i></label>
					<input type="radio" class="btn-check" name="oper" id="pow" value="^">
					<label class="btn btn-secondary" for="pow" title="Potenciación" data-bs-toggle="tooltip" data-bs-placement="top"><i data-feather="chevron-up"></i></label>
					<div class="col-12">
						<button type="submit" name="calc" class="btn btn-primary">Calcular</button>
						<button type="reset" class="btn btn-danger">Borrar</button>
					</div>
				</form>
			</div>
			<div class="col-md-8">
				<div id="dx">
					<h1>Resultado</h1>
					<div id="box-resultado">
						<div id="resultado">0</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
	<script src="https://malsup.github.io/jquery.form.js"></script>
	<!-- choose one -->
	<script src="https://unpkg.com/feather-icons"></script>
	<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
	<script>
  	feather.replace();
  	const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
		const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
  	const numero1=document.getElementById('numero1');
  	const numero2=document.getElementById('numero2');
  	const result=document.getElementById('resultado');
  	onload=()=>result.innerText=0;
  	numero1.addEventListener('click', ()=>{
  		numero1.value='';
  	});
  	numero2.addEventListener('click', ()=>{
  		numero2.value='';
  	});
  	$(document).ready(()=>{
  		$('#FrmCalc').ajaxForm({
  			target: '#resultado',
  			beforeSubmit: (formData,jqForm)=>{
  				var form=jqForm[0];
  				if (!form.numero1.value || !form.numero2.value) {
  					$('#resultado').text('No es número');
  					return false;
  				}else {
  					$('#resultado').text('0');
  				}
  			}
  		});
  	});
	</script>
</body>
</html>