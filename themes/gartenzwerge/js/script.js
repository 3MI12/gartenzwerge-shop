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

$("#checkboxStatus").click(function(){
	if( $(this).prop("checked") == true ){
		$(this).prop("checked" , false);
		$("#checkboxStatus label").animate( { left: 7, backgroundColor: "red" }, "slow");
		}
		else {
			$(this).prop("checked" , true);
			$("#checkboxStatus label").animate( { left: 40, backgroundColor: "white" }, "slow");
			}
	})

$("#checkboxAdmin").click(function(){
	if( $(this).prop("checked") == true ){
		$(this).prop("checked" , false);
		$("#checkboxAdmin label").animate( { left: 7, backgroundColor: "red" }, "slow");
		}
		else {
			$(this).prop("checked" , true);
			$("#checkboxAdmin label").animate( { left: 40, backgroundColor: "white" }, "slow");
			}
	

	
/*	var c = this.checked ? '7' : '40';
    $("#checkboxStatus label").animate( { left: c }, "slow");*/
	})

});