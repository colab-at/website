//Jquery

//Adds href value from child a to parent  
$( "section.matrix" ).on( "click", "article", function() {
	var url = $("a", $(this)).attr("href");
	document.location = url;
});

