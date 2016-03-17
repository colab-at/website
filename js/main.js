// Jquery
$(function(){

	/*
	// ALL WEBSITE
	*/

	$("button.open-menu").on( "click", function() {
		$("nav.main-nav").toggleClass("active");
	});


	// Get current url and mark active item in menu
	var a_active;
	function activeMenu() {
		var currentURL = document.URL;
		currentURL = currentURL.split("#").pop();
		$( "ol.menu ol li a" ).each( function() {
			var a_url = $(this).attr("href");
			a_url = a_url.split("#").pop();
		    if ( currentURL === a_url ) {
		    	a_active = $(this);
		    	a_active.addClass("active");
		    }
		});
	}
	activeMenu();

	$( "ol.menu ol li a" ).on( "click", function() {

		a_active.removeClass("active");
		a_active = $(this);
		a_active.addClass("active");

		$("button.open-menu").trigger("click");
	});



	/* 
	// HOME
	*/

	if( $("body").hasClass("home") ){

		// Passes href value from child a to parent  
		$( "section.matrix" ).on( "click", "article", function() {
			var url = $("a", $(this)).attr("href");
			if ( url !== undefined ) {
				document.location = url;
			}
		});

	}//is home



	/*
	// PAGE
	*/

	if( $("body").hasClass("page") || $("body").hasClass("single") ){

		//Auto resise commentform textarea
		autosize( $("#comment") );	

		//
		$( ".comment" ).on( "click", "a.comment-reply-link", function() {
			$("#respond").addClass("to-reply");
		});
		$( "#cancel-comment-reply-link" ).on( "click", function() {
			$("#respond").removeClass("to-reply");
		});


/*
		// Article sidebar
		$("aside.sidebar").on( "click", "button.open-sidebar", function() {
			var sidebar = $(this).parent();
			var button = $(this);
			sidebar.toggleClass("open");
			if ( sidebar.hasClass("open") ){
				// clicking out of sidebar triggers click
				$(document).on( "click", function (e) {
					// if the target of the click isn't the sidebar nor a descendant of the sidebar
					if (!sidebar.is(e.target) && sidebar.has(e.target).length === 0) { 
						button.trigger("click");
						// turn off event so it only triggers once
						$(document).off(e);
					}
				});
			} else {
				// turn off document click event if closed
				$(document).off();
			}
		});
*/
		



/*

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


		scene.on("progress", function (event) {
			window.console.log("Scene progress changed to " + event.progress);
		});

		scene.on("start", function (event) {
			window.console.log("Hit start point of scene.");
		});

		scene.on("end", function (event) {
			event.scrollDirection = "REVERSE";
			window.console.log("Hit end point of scene.");
		}); 
		//

*/

	}//isPage


}); //Jquery

