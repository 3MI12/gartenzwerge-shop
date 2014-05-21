$( document ).ready(function() {

/** hide search field **/
if( $("#filter").length ){ $("#suche").css("display" , "diplay") } else { $("#suche").css("display" , "none") }

/** article new input fills **/
if($("#articleEditForm input[name='size']").val() == ""){$("#articleEditForm input[name='size']").val(5);}else{}
if($("#articleEditForm input[name='price']").val() == 0.00){$("#articleEditForm input[name='price']").val(1.00);}else{}
if($("#articleEditForm input[name='vat']").val() == 0.00){$("#articleEditForm input[name='vat']").val(7.00);}else{}

	
/** suche **/
$("#btn-search").click(function(){
	var nameCompare = false;
	var genderCompare = false;
	var materialCompare = false;
	var colorCompare = false;
	var categoryCompare = false;
	var searchText = $("#searchField").val().toLowerCase();
	
	if( searchText.length >= 3 ){
	
	$(".articleListItemWrapper").each(function() {
		
		var labelName = $(this).children(".articleInfos").children(".articleName").children("span").text();
		var labelGender = $(this).children(".articleInfos").children(".articleGender").children("span").text();
		var labelMaterial = $(this).children(".articleInfos").children(".articleMaterial").children("span").text();
		var labelColor = $(this).children(".articleInfos").children(".articleColor").children("span").text();
		var labelCategory = $(this).children(".articleInfos").children(".articleCategory").children("span").text();
		
		$(this).children(".articleInfos").children(".articleName").children("span").html(labelName);
		$(this).children(".articleInfos").children(".articleGender").children("span").html(labelGender);
		$(this).children(".articleInfos").children(".articleMaterial").children("span").html(labelMaterial);
		$(this).children(".articleInfos").children(".articleColor").children("span").html(labelColor);
		$(this).children(".articleInfos").children(".articleCategory").children("span").html(labelCategory);
		
		labelName = labelName.toLowerCase();
		labelGender = labelGender.toLowerCase();
		labelMaterial = labelMaterial.toLowerCase();
		labelColor = labelColor.toLowerCase();
		labelCategory = labelCategory.toLowerCase();
				
		if( labelName.indexOf(searchText) >= 0){
			 nameCompare = true;
			 var startSearchText = labelName.indexOf(searchText);
			 var s1 = labelName.substr(0,startSearchText);
			 var s2 = labelName.substr(startSearchText + searchText.length);
			 
			 if( labelName.indexOf(searchText) == 0 ){ searchText = searchText.charAt(0).toUpperCase() + searchText.slice(1); } 
			 else { s1 = s1.charAt(0).toUpperCase() + s1.slice(1); }
			 
			 $(this).children(".articleInfos").children(".articleName").children("span").html(s1 + "<span style='color:#D8A758'>" + searchText + "</span>" + s2);
			  }
			 else { nameCompare = false }
		
		if( labelGender.indexOf(searchText) >= 0){
			 genderCompare = true;
			 var startSearchText = labelGender.indexOf(searchText);
			 var s1 = labelGender.substr(0,startSearchText);
			 var s2 = labelGender.substr(startSearchText + searchText.length);
			 $(this).children(".articleInfos").children(".articleGender").children("span").html(s1 + "<span style='color:#D8A758'>" + searchText + "</span>" + s2); }
			 else { genderCompare = false }
			 
		if( labelMaterial.indexOf(searchText) >= 0){
			 materialCompare = true;
			 var startSearchText = labelMaterial.indexOf(searchText);
			 var s1 = labelMaterial.substr(0,startSearchText);
			 var s2 = labelMaterial.substr(startSearchText + searchText.length);
			 
			 if( labelMaterial.indexOf(searchText) == 0 ){ searchText = searchText.charAt(0).toUpperCase() + searchText.slice(1); } 
			 else { s1 = s1.charAt(0).toUpperCase() + s1.slice(1); }
			 
			 $(this).children(".articleInfos").children(".articleMaterial").children("span").html(s1 + "<span style='color:#D8A758'>" + searchText + "</span>" + s2); }
			 else { materialCompare = false }
		
		if( labelColor.indexOf(searchText) >= 0){
			 colorCompare = true;
			 var startSearchText = labelColor.indexOf(searchText);
			 var s1 = labelColor.substr(0,startSearchText);
			 var s2 = labelColor.substr(startSearchText + searchText.length);
			 $(this).children(".articleInfos").children(".articleColor").children("span").html(s1 + "<span style='color:#D8A758'>" + searchText + "</span>" + s2);  }
			 else { colorCompare = false }
		
		if( labelCategory.indexOf(searchText) >= 0){
			 categoryCompare = true;
			 var startSearchText = labelCategory.indexOf(searchText);
			 var s1 = labelCategory.substr(0,startSearchText);
			 var s2 = labelCategory.substr(startSearchText + searchText.length);
			 $(this).children(".articleInfos").children(".articleCategory").children("span").html(s1 + "<span style='color:#D8A758'>" + searchText + "</span>" + s2);  }
			 else { categoryCompare = false }
		
		if( (genderCompare || nameCompare || colorCompare || materialCompare || categoryCompare) == true) { $(this).fadeIn("slow") } else { $(this).fadeOut("slow") }
		})
		
		} else {
			$("#filterError").html("Das Suchwort muss mindestens 3 Zeichen lang sein.");
			$("#filterError").fadeIn("slow").delay(5000).fadeOut("slow");
			}
		
	
})	
	
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
		if(scrollPosition > 100 && menuPosition == "65px"){
			$("#menu").stop( true, true ).animate({
				top: 10
				},"slow");
			$("#iconContainer").stop( true, true ).animate({
				top: 5, width: 100, height: 100
				},"slow");
			}
			
		if(scrollPosition <= 100 && menuPosition == "10px"){
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
	     	$("#filterError").html("Es muss mindestens ein Geschlecht und mindestens eine Kategorie ausgewählt werden!");	     
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

var selectedCategory = $("#articleEditForm select[name='category'] option:selected").val();
$("#articleEditForm select[name='category'] option").each(function(){
	if( $(this).val() == selectedCategory ){
		$(this).css("display" , "none");
		}	
})

var selectedGender = $("#articleEditForm select[name='gender'] option:selected").val();
$("#articleEditForm select[name='gender'] option").each(function(){
	if( $(this).val() == selectedGender ){
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



