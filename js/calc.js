const numero1=document.getElementById('numero1');
const numero2=document.getElementById('numero2');
const btn_sumar=document.getElementById('btn_sumar');
const btn_restar=document.getElementById('btn_restar');
const btn_multiplicar=document.getElementById('btn_multiplicar');
const btn_dividir=document.getElementById('btn_dividir');
const btn_potenciar=document.getElementById('btn_potenciar');
const btn_borrar=document.getElementById('btn_borrar');
const result=document.getElementById('resultado');

numero1.addEventListener('click', ()=>{
	numero1.value='';
});
numero2.addEventListener('click', ()=>{
	numero2.value='';
});
btn_sumar.onclick=()=>{
	let num1=parseFloat(numero1.value);
	let num2=parseFloat(numero2.value);
	result.innerText='';
	if (isNaN(num1) || isNaN(num2)) {
		result.innerText='Ingresar sólo valores numéricos';
	} else {
		result.innerText=num1+num2;
	}
}
btn_restar.onclick=()=>{
	let num1=parseFloat(numero1.value);
	let num2=parseFloat(numero2.value);
	result.innerText='';
	if (isNaN(num1) || isNaN(num2)) {
		result.innerText='Ingresar sólo valores numéricos';
	} else {
		result.innerText=num1-num2;
	}
}
btn_multiplicar.onclick=()=>{
	let num1=parseFloat(numero1.value);
	let num2=parseFloat(numero2.value);
	result.innerText='';
	if (isNaN(num1) || isNaN(num2)) {
		result.innerText='Ingresar sólo valores numéricos';
	} else {
		result.innerText=num1*num2;
	}
}
btn_dividir.onclick=()=>{
	let num1=parseFloat(numero1.value);
	let num2=parseFloat(numero2.value);
	result.innerText='';
	if (isNaN(num1) || isNaN(num2)) {
		result.innerText='Ingresar sólo valores numéricos';
	} else {
		if (num2!=0) {
			result.innerText=num1/num2;
		}else {
			result.innerText='División por cero';
		}
	}
}
btn_potenciar.onclick=()=>{
	let num1=parseFloat(numero1.value);
	let num2=parseFloat(numero2.value);
	result.innerText='';
	if (isNaN(num1) || isNaN(num2)) {
		result.innerText='Ingresar sólo valores numéricos';
	} else {
		result.innerText=num1**num2;
	}
}
btn_borrar.onclick=()=>{
	numero1.value=0;
	numero2.value=0;
	result.innerText=0;
}