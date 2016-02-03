// Jquery
$(function(){

	// if is .home 
	if($("body").hasClass("home")){

		// Adds href value from child a to parent  
		$( "section.matrix" ).on( "click", "article", function() {
			var url = $("a", $(this)).attr("href");
			document.location = url;
		});

	}//is home

	// if is .page
	if($("body").hasClass("page")){

		// ScrollMagic
		// init controller
		var controller = new ScrollMagic.Controller();
		var pin = "#page-header";

		// create a scene
		var scene = new ScrollMagic.Scene({
		    offset: $(pin).height()
		})
		.setPin( pin, {pushFollowers: false} )	
		.addTo(controller)
		.on( "progress", function (event) {

			var st1;
			var st2;

			if ( event.progress === 1 ) {
				clearTimeout(st2);
			    $(pin).children().fadeOut(100);
			    st1 = setTimeout(function(){
					$(pin).addClass("fixed").children().fadeIn(400);
				}, 300);
			} else if ( event.progress === 0 ) {
				clearTimeout(st1);
				$(pin).children().fadeOut(100);
				st2 = setTimeout(function(){
					$(pin).removeClass("fixed").children().fadeIn(400);
				}, 300);
			}
		});

		/*

		scene.on("progress", function (event) {
			window.console.log("Scene progress changed to " + event.progress);
		});

		scene.on("start", function (event) {
			window.console.log("Hit start point of scene.");
		});

		scene.on("end", function (event) {
			event.scrollDirection = "REVERSE";
			window.console.log("Hit end point of scene.");
		}); */
		//


	}//isPage


}); //Jquery

