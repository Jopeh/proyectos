<?php
if (isset($_POST['calc'])) {
	$numero1=$_POST['numero1'];
	$numero2=$_POST['numero2'];
	if (is_numeric($numero1) or is_numeric($numero2)){
		if (isset($_POST['oper'])) {
			$opt=$_POST['oper'];
			switch ($opt) {
				case '+':
					echo $numero1+$numero2;
					break;
				case '-':
					echo $numero1-$numero2;
					break;
				case '*':
					echo $numero1*$numero2;
					break;
				case '/':
					if ($numero2==0) {
						echo 'División por 0';
					} else {
						echo $numero1/$numero2;
					}
					break;
				case '^':
					echo $numero1**$numero2;
					break;
				default:
					// code...
					break;
			}
		}
	}
}
?>