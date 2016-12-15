var d = document;

btnIrArriba = d.querySelector('.scroll-up');

function arriba(evento){
	evento.preventDefault();
    $("body, html").animate({
        scrollTop: "0px"
    },300);
}

function main() {
	btnIrArriba.addEventListener( 'click', arriba );

	$(window).scroll(function(){
		if ( $(this).scrollTop() > 0 ) {
			$(".scroll-up").slideDown(300);
		} else{
			$(".scroll-up").slideUp(300);
		};
	});
}

window.addEventListener('load', main);