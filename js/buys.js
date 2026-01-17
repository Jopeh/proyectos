const api="../uploads/buys.json";
const btn_cl=document.getElementById('btn_cl');
const app=document.getElementById('app');
const title=document.getElementById('title');
const filter=document.getElementById('filter');
const box_filter=document.getElementById('box_filter');
let lista=[];

onload=()=>{
	carga_lista();
	box_filter.classList.remove('fuera');
}

btn_cl.addEventListener('click', (e)=>{
	carga_lista();
	filter.value='';
	box_filter.classList.remove('fuera');
});
filter.addEventListener('input', (e)=>{
	const txt=filter.value.toLowerCase();
	let nl=lista.filter(item=>item.producto.toLowerCase().includes(txt));
	crea_lista(nl);
});

function carga_lista() {
	fetch(api)
	.then(res=>res.json())
	.then(el=>{
		console.log(el);
		crea_lista(el);
		lista=el;
	})
	.catch(err=>console.log(err));
}
function crea_lista(list) {
	var n=list.length;
	app.innerHTML='';
	title.innerText='Listado de compras';
	if (n) {
		let suma=0;
		const tbl=document.createElement('table');
		tbl.classList.add('table', 'table-striped', 'table-hover', 'table-bordered', 'table-dark');
		const th=document.createElement('thead');
		th.classList.add('table-primary');
		const thr=document.createElement('tr');
		const thProducto=document.createElement('th');
		thProducto.textContent='Producto';
		thr.appendChild(thProducto);
		const thSubtotal=document.createElement('th');
		thSubtotal.textContent='Subtotal';
		thr.appendChild(thSubtotal);
		th.appendChild(thr);
		tbl.appendChild(th);
		const tb=document.createElement('tbody');
		list.forEach((el,idx)=>{
			const tbr=document.createElement('tr');
			tbr.addEventListener('click', (ev)=>{
				crea_ficha(el);
			});
			const tbProducto=document.createElement('td');
			tbProducto.textContent=el.producto;
			tbr.appendChild(tbProducto);
			const tbSubtotal=document.createElement('td');
			tbSubtotal.setAttribute('align', 'right');
			tbSubtotal.textContent=el.Subtotal.toFixed(2);
			suma+=el.Subtotal;
			tbr.appendChild(tbSubtotal);
			tb.appendChild(tbr);
		});
		tbl.appendChild(tb);
		const tf=document.createElement('tfoot');
		tf.classList.add('table-info');
		const tfr=document.createElement('tr');
		const tfTotal=document.createElement('td');
		tfTotal.setAttribute('align', 'right');
		tfTotal.textContent='Total';
		tfr.appendChild(tfTotal);
		const tfSuma=document.createElement('td');
		tfSuma.setAttribute('align', 'right');
		tfSuma.textContent=suma.toFixed(2);
		tfr.appendChild(tfSuma);
		tf.appendChild(tfr);
		tbl.appendChild(tf);
		app.appendChild(tbl);
	} else {
		app.innerHTML='No hay elementos para mostrar';
	}
}
function crea_ficha(item) {
	console.log(item);
	let ficha=`<div class="card text-bg-dark mb-3">
	<div class="card-header">${item.producto}</div>
	<div class="card-body">
	<h5 class="card-title">Cantidad: ${item.cantidad}</h5>
	<p class="card-text">Precio: $ ${item.precio.toFixed(2)}</p>
	</div>
</div>`;
	app.innerHTML=ficha;
	title.innerText='Ficha del item';
	box_filter.classList.add('fuera');
}