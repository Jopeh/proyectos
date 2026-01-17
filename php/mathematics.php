<?php
function sqr($num)
{
	return $num*$num;
}
function factorial($num)
{
	$fact=1;
	if ($num==0 or $num==1) {
		return $fact;
	} else {
		for ($i = 2; $i <= $num; ++$i) {
			$fact*=$i;
		}
		return $fact;
	}
}
?>