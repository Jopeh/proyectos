const sqr=(num)=>num*num;
const factorial=(num)=>{
	let fact=1;
	if (num==0 || num==1) {
		return fact;
	}else{
		for(var i = 2, n = num; i <= n; i++){
			fact*=i;
		}
		return fact;
	}
}
export {sqr,factorial};