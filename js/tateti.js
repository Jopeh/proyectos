const celdas=document.querySelectorAll('.celda');
const celd=document.getElementById('celd');
const mensaje=document.getElementById('mensaje');
const botonIniciar=document.getElementById('botonIniciar');
const botonReiniciar=document.getElementById('botonReiniciar');
const inputJugador1=document.getElementById('jugador1');
const inputJugador2=document.getElementById('jugador2');
const entrada_nombres=document.getElementById('entrada_nombres');
let nombresJugadores=['',''];
let turnoJugador=1;
let juegoActivo=false;
let tablero=['','','','','','','','',''];
const combinacionesGanadoras=[
	[0,1,2],
	[3,4,5],
	[6,7,8],
	[0,3,6],
	[1,4,7],
	[2,5,8],
	[0,4,8],
	[2,4,6]
];

celdas.forEach( (celda, index)=> {
	celda.addEventListener('click', ()=>manejarClickCelda(index));
});

function manejarClickCelda (index) {
	if (tablero[index]!=='' || !juegoActivo) {
		return;
	}
	const simbolo=turnoJugador===1? 'X':'O';
	let clase=turnoJugador===1? `<div class="cruz"></div>`:`<div class="anillo"></div>`;
	tablero[index]=simbolo;
	celdas[index].innerHTML=clase;
	if (verificarGanador()) {
		mensaje.textContent=`¡${nombresJugadores[turnoJugador-1]} ha ganado!`;
		juegoActivo=false;
		entrada_nombres.style.display='block';
		botonIniciar.style.display='block';
		botonReiniciar.style.display='none';
		celd.style.display='none';
		return;
	}
	if (tablero.every(celda=>celda!=='')) {
		mensaje.textContent='Es un empate';
		juegoActivo=false;
		entrada_nombres.style.display='block';
		botonIniciar.style.display='block';
		botonReiniciar.style.display='none';
		celd.style.display='none';
		return;
	}
	turnoJugador=turnoJugador===1? 2:1;
	mensaje.textContent=`Turno de ${nombresJugadores[turnoJugador-1]}`;
	clase=turnoJugador===1? `<div class="cruz"></div>`:`<div class="anillo"></div>`;
	celd.innerHTML=clase;
}
function verificarGanador() {
	return combinacionesGanadoras.some(combinacion=>{
		return combinacion.every(index=>{
			return tablero[index]===(turnoJugador===1? 'X':'O');
		});
	});
}
function reiniciarJuego() {
	turnoJugador=1;
	const clase=turnoJugador===1? `<div class="cruz"></div>`:`<div class="anillo"></div>`;
	juegoActivo=true;
	tablero=['','','','','','','','',''];
	celdas.forEach(celda=>{
		celda.innerHTML='';
	});
	celd.innerHTML=clase;
	mensaje.textContent=`Turno de ${nombresJugadores[0]}`;
	notify('Tateti','Juego reiniciado');
}
function iniciarJuego() {
	turnoJugador=1;
	const clase=turnoJugador===1? `<div class="cruz"></div>`:`<div class="anillo"></div>`;
	juegoActivo=true;
	tablero=['','','','','','','','',''];
	celdas.forEach(celda=>{
		celda.innerHTML='';
	});
	celd.innerHTML=clase;
	mensaje.textContent=`Turno de ${nombresJugadores[0]}`;
}

botonIniciar.addEventListener('click',()=>{
	iniciarJuego();
	const nombre1=inputJugador1.value.trim();
	const nombre2=inputJugador2.value.trim();
	inputJugador1.value='';
	inputJugador2.value='';
	if (!nombre1 || !nombre2) {
		mensaje.textContent='Por favor, ingresa los nombres de ambos jugadores';
		juegoActivo=false;
		return;
	}
	if (nombre1.toLowerCase()===nombre2.toLowerCase()) {
		mensaje.textContent='Nombres iguales';
		juegoActivo=false;
		return;
	}
	nombresJugadores=[nombre1,nombre2];
	mensaje.textContent=`Turno de ${nombresJugadores[turnoJugador-1]}`;
	juegoActivo=true;
	entrada_nombres.style.display='none';
	botonIniciar.style.display = 'none';
	botonReiniciar.style.display='block';
	celd.style.display = 'flex';
});
botonReiniciar.addEventListener('click',reiniciarJuego);