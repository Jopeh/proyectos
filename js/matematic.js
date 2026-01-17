import {sqr,factorial} from './mathematics.js';

const number=document.getElementById('number');
const calc=document.getElementById('calc');
const result=document.getElementById('result');

calc.onclick=(ev)=>{
	ev.preventDefault();
	let num=parseInt(number.value);
	result.innerHTML='';
	if (isNaN(num)) {
		bootbox.alert({
			message:'No es número',
			size:'small',
			centerVertical:true
		});
	} else {
		let text=`<table class="table table-dark table-bordered table-striped table-hover">
		<thead>
		<tr>
		<th>Número</th>
		<th>Cuadrado</th>
		<th>Factorial</th>
		</tr>
	</thead><tbody>`;
		for(var i = 0, n = num; i <= n; i++){
			text+=`<tr>
			<td align="right">${i}</td>
			<td align="right">${sqr(i)}</td>
			<td align="right">${factorial(i)}</td>
		</tr>`;
		}
	text+=`</tbody></table>`;
		result.innerHTML=text;
	}
}