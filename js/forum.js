document.getElementById("f-1").addEventListener("click", clickfunctoin1);
document.getElementById("f-2").addEventListener("click", clickfunctoin2);
document.getElementById("f-3").addEventListener("click", clickfunctoin3);
document.getElementById("f-4").addEventListener("click", clickfunctoin4);
document.getElementById("b-1").addEventListener("click", clickfunctoin2);
document.getElementById("b-2").addEventListener("click", clickfunctoin3);
document.getElementById("b-3").addEventListener("click", clickfunctoin4);


function clickfunctoin1() {
	document.getElementById("f-2").classList.remove("f-active");
	document.getElementById("f-3").classList.remove("f-active");
	document.getElementById("f-4").classList.remove("f-active");
	document.getElementById("c-4").classList.remove("s-active");
	document.getElementById("c-3").classList.remove("s-active");
	document.getElementById("c-2").classList.remove("s-active");
	document.getElementById("c-1").classList.add("s-active");
}

function clickfunctoin2() {
	document.getElementById("f-4").classList.remove("f-active");
	document.getElementById("f-3").classList.remove("f-active");
	document.getElementById("f-2").classList.add("f-active");
	document.getElementById("c-4").classList.remove("s-active");
	document.getElementById("c-3").classList.remove("s-active");
	document.getElementById("c-1").classList.remove("s-active");
	document.getElementById("c-2").classList.add("s-active");
}

function clickfunctoin3() {
	document.getElementById("f-4").classList.remove("f-active");
	document.getElementById("f-2").classList.remove("f-active");
	document.getElementById("f-3").classList.add("f-active");
	document.getElementById("c-4").classList.remove("s-active");
	document.getElementById("c-2").classList.remove("s-active");
	document.getElementById("c-1").classList.remove("s-active");
	document.getElementById("c-3").classList.add("s-active");
}

function clickfunctoin4() {
	document.getElementById("f-2").classList.remove("f-active");
	document.getElementById("f-3").classList.remove("f-active");
	document.getElementById("f-4").classList.add("f-active");
	document.getElementById("c-3").classList.remove("s-active");
	document.getElementById("c-2").classList.remove("s-active");
	document.getElementById("c-1").classList.remove("s-active");
	document.getElementById("c-4").classList.add("s-active");
}
