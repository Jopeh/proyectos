const hour=document.getElementById('hora');
setInterval(()=>{
	const date=new Date();
	const months=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
	const days=['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'];
	hour.innerHTML=`${days[date.getDay()]} ${date.getDate()} ${months[date.getMonth()]} de ${date.getFullYear()}, ${date.getHours()}:${date.getMinutes().toString().padStart(2,'0')}:${date.getSeconds().toString().padStart(2,'0')}`;
}, 1000);