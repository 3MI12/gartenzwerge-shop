$( document ).ready(function() {
/** Artikelverwaltung **/

/*** footer ausklappen ***/
$("#footerUp").click(function(){
	$("#footerUp").css("display","none");
	$("#footerDown").css("display","block");
	$("#footerWrapper").animate({ height: 250},300);
	})

$("#footerDown").click(function(){
	$("#footerDown").css("display","none");
	$("#footerUp").css("display","block");
	$("#footerWrapper").animate({ height: 100},300);
	})

/*** Produktbeschreibung ausklappen ***/
$(".btn-articleText").click(function(){
	$(this).parent("form").children(".articleText").toggle(1000);
});
});