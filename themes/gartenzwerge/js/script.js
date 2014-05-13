$( document ).ready(function() {
	if( $(".checkboxStatus").prop("checked") == true ){
		$(".checkboxStatus").children("label").css( { left: 7, backgroundColor: "#444444" } );
		}
		else {
			$(".checkboxStatus").children("label").css( { left: 40, backgroundColor: "#BCC2BA" } );
			}
	
	if( $(".checkboxAdmin").prop("checked") == true ){
		$(".checkboxAdmin").children("label").css( { left: 7, backgroundColor: "#444444" } );
		}
		else {
			$(".checkboxAdmin").children("label").css( { left: 40, backgroundColor: "#BCC2BA" } );
			}
	
	if( $(".checkboxArticleActive").prop("checked") == true ){
		$(".checkboxArticleActive").children("label").css( { left: 7, backgroundColor: "#444444" } );
		}
		else {
			$(".checkboxArticleActive").children("label").css( { left: 40, backgroundColor: "#BCC2BA" } );
			}
	
	
	});

$( document ).ready(function() {
/** header items fadeOut on contentSrcolling **/	
/*	$(window).scroll(function(){
		var scrollPosition = $(this).scrollTop();
		if(scrollPosition > 280){
			$("#menu").fadeOut("slow");}
			else { $("#menu").fadeIn("slow"); }
		})*/
		
$(window).scroll(function(){
		var scrollPosition = $(this).scrollTop();
		var menuPosition = $("#menu").css("top");
		if(scrollPosition > 280 && menuPosition == "65px"){
			$("#menu").animate({
				top: 10
				},"slow");
			$("#iconContainer").animate({
				top: 5, width: 100, height: 100
				},"slow");
			}
			
		if(scrollPosition <= 280 && menuPosition == "10px"){
			$("#menu").animate({
				top: 65
				},"slow");
			$("#iconContainer").animate({
				top: 20, width: 165, height: 165
				},"slow");
			}
		})
	
/** filter **/
function filter(){
	alert("test");
	}

/*$("#btn-filter").click(function(){
	var genderMaleFilter;
	var genderFemaleFilter; 
	if($("#filter input[type='male']").is(":checked")){ genderMaleFilter = true } else { genderMaleFilter = false };
	if($("#filter input[type='female']").is(":checked")){ genderFemaleFilter = true } else { genderFemaleFilter = false };
	var colorFilter = $("#filter select[name='farbe']").prop("value");
	var materialFilter = $("#filter select[name='material']").prop("value");
	var minSizeFilter = $("#filter #rangeBoxMin input[type='range']").prop("value");
	var maxSizeFilter = $("#filter #rangeBoxMax input[type='range']").prop("value");
	
	alert( genderMaleFilter + " " + genderFemaleFilter + " " + colorFilter + " " + materialFilter + " " + minSizeFilter + " " + maxSizeFilter);
	
	$(".articleListItemWrapper").each(function() {
        var genderMaleArticle;
		var genderMaleArticle;
		if($(this).children("articleGender span").text() == "male"){ genderMaleArticle = true } else { genderMaleArticle = false };
		if($(this).children("articleGender span").text() == "female"){ genderFemaleArticle = true } else { genderFemaleArticle = false };
		var colorArticle = $(this).children("articleColor span").text()
		var materialArticle = $(this).children("materialColor span").text()
		
		if( materialFilter == material() )
    });
	
	})*/

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

$(".checkboxStatus").click(function(){
	alert($(this).children("input").prop("checked"));
	if( $(this).children("input").prop("checked") == true ){
		$(this).children("input").attr("checked" , false);
		$(this).children("label").animate( { left: 7, backgroundColor: "#444444" }, "slow");
		}
		 else {
			$(this).children("input").attr("checked" , true);
			$(this).children("label").animate( { left: 40, backgroundColor: "#BCC2BA" }, "slow");
			}
})

$(".checkboxAdmin").click(function(){
	if( $(this).prop("checked") == true ){
		$(this).prop("checked" , false);
		$(this).children("label").animate( { left: 7, backgroundColor: "#444444" }, "slow");
		}
		else {
			$(this).prop("checked" , true);
			$(this).children("label").animate( { left: 40, backgroundColor: "#BCC2BA" }, "slow");
			}
	})
	
$(".checkboxArticleActive").click(function(){
	if( $(this).prop("checked") == true ){
		$(this).prop("checked" , false);
		$(this).children("label").animate( { left: 7, backgroundColor: "#444444" }, "slow");
		}
		else {
			$(this).prop("checked" , true);
			$(this).children("label").animate( { left: 40, backgroundColor: "#BCC2BA" }, "slow");
			}
	})

});