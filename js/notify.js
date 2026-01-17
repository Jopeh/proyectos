Notification.requestPermission().then((res)=>{
	console.log(res);
});
function notify(title,text) {
	if (!("Notification" in window)) {
		alert('La versión de su navegador web no soporta notificaciones web');
	}else if (Notification.permission==='granted') {
		var notificacion=new Notification(title, {
			body: text
		});
		setTimeout(notificacion.close.bind(notificacion), 5000);
	}
}