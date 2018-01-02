// document.getElementById("title-list-1").addEventListener("mouseover", hoverfunctoin1);
// document.getElementById("title-list-2").addEventListener("mouseover", hoverfunctoin2);
// document.getElementById("title-list-3").addEventListener("mouseover", hoverfunctoin3);
document.getElementById("title-list-1").addEventListener("click", hoverfunctoin1);
document.getElementById("title-list-2").addEventListener("click", hoverfunctoin2);
document.getElementById("title-list-3").addEventListener("click", hoverfunctoin3);


function hoverfunctoin1() {
	document.getElementById("t-list-1").classList.add("dplay");
	document.getElementById("t-list-2").classList.remove("dplay");
	document.getElementById("t-list-3").classList.remove("dplay");
}
function hoverfunctoin2() {
	document.getElementById("t-list-2").classList.add("dplay");
	document.getElementById("t-list-1").classList.remove("dplay");
	document.getElementById("t-list-3").classList.remove("dplay");
}
function hoverfunctoin3() {
	document.getElementById("t-list-3").classList.add("dplay");
	document.getElementById("t-list-1").classList.remove("dplay");
	document.getElementById("t-list-2").classList.remove("dplay");
}
