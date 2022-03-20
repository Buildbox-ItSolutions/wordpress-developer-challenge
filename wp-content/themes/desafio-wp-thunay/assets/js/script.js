var descricaoArchive = document.querySelector('.descricaoArchive');
var headerPrincipal = document.querySelector('.headerPrincipal');



window.addEventListener('scroll', function() {
	let viewportHeight = window.innerHeight;
	let viewportWidth = window.innerWidth;
	
	if(viewportWidth > 768){
		let elem = document.querySelector('body');
		let rect = elem.getBoundingClientRect();
		console.log("x: "+ rect.x);
		console.log("y: "+ rect.y);

		if(rect.y < 0){
			descricaoArchive.classList.add('scrolling');
			headerPrincipal.classList.add('op-0');
		}
		else{
			descricaoArchive.classList.remove('scrolling');
			headerPrincipal.classList.remove('op-0');
		}
	}
});