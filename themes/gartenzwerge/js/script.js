$( document ).ready(function() {
/** checkbox **/
$(".checkboxStatus").each(function(){
	if( $(this).children("input").val() == "true" ) {
		$(this).children("label").css( { left: 40, backgroundColor: "#BCC2BA" } );
		}
		else {
			$(this).children("label").css( { left: 7, backgroundColor: "#444444" } );
			}
	})

$(".checkboxAdmin").each(function(){
	if( $(this).children("input").val() == "true" ) {
		$(this).children("label").css( { left: 40, backgroundColor: "#BCC2BA" } );
		}
		else {
			$(this).children("label").css( { left: 7, backgroundColor: "#444444" } );
			}
	})

$(".checkboxStatus").click(function(){
	if( $(this).children("input").val() == "true" ){
		$(this).children("input").val("false");
		$(this).children("label").animate( { left: 7, backgroundColor: "#444444" }, "slow");
		}
		 else {
			$(this).children("input").val("true");
			$(this).children("label").animate( { left: 40, backgroundColor: "#BCC2BA" }, "slow");
			}
})

$(".checkboxAdmin").click(function(){
	if( $(this).children("input").val() == "true" ){
		$(this).children("input").val("false");
		$(this).children("label").animate( { left: 7, backgroundColor: "#444444" }, "slow");
		}
		else {
			$(this).children("input").val("true");
			$(this).children("label").animate( { left: 40, backgroundColor: "#BCC2BA" }, "slow");
			}
	})
	
$(".checkboxArticleActive").click(function(){
	if( $(this).children("input").val() == "true" ){
		$(this).children("input").val("false");
		$(this).children("label").animate( { left: 7, backgroundColor: "#444444" }, "slow");
		}
		else {
			$(this).children("input").val("true");;
			$(this).children("label").animate( { left: 40, backgroundColor: "#BCC2BA" }, "slow");
			}
	})
});

$( document ).ready(function() {
/** header items fadeOut on contentSrcolling **/	
$(window).scroll(function(){
		var scrollPosition = $(this).scrollTop();
		var menuPosition = $("#menu").css("top");
		if(scrollPosition > 280 && menuPosition == "65px"){
			$("#menu").stop( true, true ).animate({
				top: 10
				},"slow");
			$("#iconContainer").stop( true, true ).animate({
				top: 5, width: 100, height: 100
				},"slow");
			}
			
		if(scrollPosition <= 280 && menuPosition == "10px"){
			$("#menu").stop( true, true ).animate({
				top: 65
				},"slow");
			$("#iconContainer").stop( true, true ).animate({
				top: 20, width: 165, height: 165
				},"slow");
			}
		})
	
/** filter **/
$("#btn-filter").click(function(){
	var genderFilter;
	var categoryFilter;
	
	if( (($("#filter input[name='male']").is(":checked") || $("#filter input[name='female']").is(":checked")) == true) && (($("#filter input[name='indoor']").is(":checked") || $("#filter input[name='outdoor']").is(":checked")) == true) )
		{	
		  	if( $("#filter input[name='male']").is(":checked") && $("#filter input[name='female']").is(":checked") )
				{ genderFilter = 3 } 
				else if( $("#filter input[name='female']").is(":checked") )
						{ genderFilter = 2; }
						else { genderFilter = 1; }
						
			if( $("#filter input[name='indoor']").is(":checked") && $("#filter input[name='outdoor']").is(":checked") )
				{ categoryFilter = 3 } 
				else if( $("#filter input[name='outdoor']").is(":checked") )
						{ categoryFilter = 2; }
						else { categoryFilter = 1; }
			
			var colorFilter = $("#filter select[name='farbe']").prop("value");
			var materialFilter = $("#filter select[name='material']").prop("value");
			var minSizeFilter = parseInt($("#filter #rangeBoxMin input[type='range']").prop("value"));
			var maxSizeFilter = parseInt($("#filter #rangeBoxMax input[type='range']").prop("value"));
				
			$(".articleListItemWrapper").each(function() {
				var showStatus;
				var genderArticle;
				var categoryArticle
				var sizeArticle;
				var genderStatus;
				var colorStatus;
				var materialStatus;
				var sizeStatus;
				var categoryStatus;
						
				if( ($(this).children(".articleInfos").children(".articleGender").children("span").text()) == "male" ){ genderArticle = 1 } else { genderArticle = 2 };
				if( ($(this).children(".articleInfos").children(".articleCategory").children("span").text()) == "indoor" ){ categoryArticle = 1 } else { categoryArticle = 2 };
				
				var colorArticle = $(this).children(".articleInfos").children(".articleColor").children("span").text();
				var materialArticle = $(this).children(".articleInfos").children(".articleMaterial").children("span").text();
				var sizeArticle = parseInt($(this).children(".articleInfos").children(".articleSize").children("span").text());
				
				if( categoryFilter == 3) { categoryStatus = true }
					else if ( categoryFilter == genderArticle ) { categoryStatus = true }
						else { categoryStatus = false }
				
				if( genderFilter == 3) { genderStatus = true }
					else if ( genderFilter == genderArticle ) { genderStatus = true }
						else { genderStatus = false }
						
				if(	colorFilter == "-") { colorStatus = true } 
					else if( colorFilter == colorArticle ) { colorStatus = true } else { colorStatus = false } 
				
				if(	materialFilter == "-") { materialStatus = true }
					else if( materialFilter == materialArticle ) { materialStatus = true } else { materialStatus = false }
					
				if( (sizeArticle > minSizeFilter) && (sizeArticle < maxSizeFilter)  ) { sizeStatus = true; } else { sizeStatus = false }
				
				if( (genderStatus && categoryStatus && colorStatus && materialStatus && sizeStatus) == true) { $(this).fadeIn("slow") } else { $(this).fadeOut("slow") }
			});
		}
	else{
			$("#filterError").fadeIn("slow").delay(5000).fadeOut("slow");	
		}
	})

/** Artikelverwaltung **/
/** selectBoxen **/
var selectedMaterial = $("#articleEditForm select[name='material'] option:selected").val();
$("#articleEditForm select[name='material'] option").each(function(){
	if( $(this).val() == selectedMaterial ){
		$(this).css("display" , "none");
		}	
})

var selectedColor = $("#articleEditForm select[name='color'] option:selected").val();
$("#articleEditForm select[name='color'] option").each(function(){
	if( $(this).val() == selectedColor ){
		$(this).css("display" , "none");
		}	
})


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