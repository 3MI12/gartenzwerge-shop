$( document ).ready(function() {

/** Artikelverwaltung **/

/*** Produktbeschreibung ausklappen ***/
$(".btn-articleText").click(function(){
	$(this).parent("form").children(".articleText").toggle(1000);
});


});