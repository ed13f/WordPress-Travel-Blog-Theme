

$(document).ready(function(){
	featureImageAnimationActive = false;
	

	// ================================[sections/featured-image-slider]=======================================
	//slider Utility Functions
	function selectSliderElements(elementType){

		var sliderContainer = $(".featured-image-slider-container")
		sliderContainer.find(".first-image").css("display", "block").removeClass("first-image")
		var list = elementType == "image" ? sliderContainer.children(".slider-image-wrapper") : $(".slider-tracking-container").children(".slider-dot")
		var postCount = list.length
		var activeElement = elementType == "image" ? sliderContainer.find(".active-img") : sliderContainer.find(".active-dot")
		var selector = elementType == "image" ? "active-img" : "active-dot"
		var sliderElementObject = { sliderContainer: sliderContainer, list: list, activeElement: activeElement, selector: selector, postCount: postCount }
		return sliderElementObject
	}

	var fadeSpeed = 1000
	function fadeOutImage(elementType, sliderElementObject){
		
		var removeElement = sliderElementObject.activeElement.removeClass(sliderElementObject.selector)
		elementType == "image" ? removeElement.fadeOut(fadeSpeed) : removeElement
	}
	function firstFadeInImage(elementType, sliderElementObject){
		var addElement = sliderElementObject.list.first().addClass(sliderElementObject.selector)
		elementType == "image" ? addElement.fadeIn(fadeSpeed, function(){featureImageAnimationActive = false;}) : addElement
	}
	function lastFadeInImage(elementType, sliderElementObject){
		var addElement = sliderElementObject.list.last().addClass(sliderElementObject.selector)
		elementType == "image" ? addElement.fadeIn(fadeSpeed, function(){featureImageAnimationActive = false;}) : addElement
	}
	function nextFadeInImage(elementType, sliderElementObject){
		// debugger
		var addElement = sliderElementObject.activeElement.next().addClass(sliderElementObject.selector)
		elementType == "image" ? addElement.fadeIn(fadeSpeed, function(){featureImageAnimationActive = false;}) : addElement
		
	}
	function dotFadeIn(elementType, sliderElementObject, index){
		var addElement = $(sliderElementObject.list.get(index)).addClass(sliderElementObject.selector)
		elementType == "image" ? addElement.fadeIn(fadeSpeed, function(){featureImageAnimationActive = false;}) : addElement
	}
	function selectFadeInImage(elementType, sliderElementObject, select){
		var addElement = sliderElementObject.sliderContainer.find(select).addClass(sliderElementObject.selector)
		elementType == "image" ? addElement.fadeIn(fadeSpeed, function(){featureImageAnimationActive = false;}) : addElement
		
	}

	// slider interval rotation
	var sliderTime = 10000
	var setSliderInterval = setInterval(sliderAutoTransition, sliderTime);

	function sliderAutoTransition(){
		// debugger
		determineAutoTransitionElement("image")
		determineAutoTransitionElement("dot")
	}

	function determineAutoTransitionElement(elementType){
		var elementList = selectSliderElements(elementType)
		if(elementList.postCount > 1){
			fadeOutImage(elementType, elementList)
			if(elementList.activeElement.is(elementList.list.last())){
				firstFadeInImage(elementType, elementList)
	  		} else{
	  			nextFadeInImage(elementType, elementList)
	  		}
	  	}
	}

	// slider dot click rotation
	function dotClicktransition(elementType, indexClickedDot){
		var sliderElementObject = selectSliderElements(elementType)
		fadeOutImage(elementType, sliderElementObject)
		dotFadeIn(elementType, sliderElementObject, indexClickedDot)
	}

	$(".slider-dot").on("click", function(){
		if(featureImageAnimationActive == true || $(this).hasClass("active-dot")){return}
		featureImageAnimationActive = true;
		var index = $(".slider-dot").index($(this))
		dotClicktransition("image", index)
		dotClicktransition("dot", index)
		clearInterval(setSliderInterval);
		setSliderInterval = setInterval(sliderAutoTransition, sliderTime);
		
	})

	// slider arrow click rotation
	$(".scroll-arrow").on( "click", function() {
		console.log("here")
		if(featureImageAnimationActive == true){return}
		featureImageAnimationActive = true;
		var arrow = $(this);
  		if(arrow.hasClass("right-arrow")){
  			clickChangeSlider(arrow)
  		} else{
  			clickChangeSlider(arrow)
  		}
  		clearInterval(setSliderInterval);
		setSliderInterval = setInterval(sliderAutoTransition, sliderTime);
	});

	function clickChangeSlider(arrowDirection){
		DetermineNextElement("image", arrowDirection)
		DetermineNextElement("dot", arrowDirection)
	}

	function DetermineNextElement(elementType, arrowDirection){
		var sliderElementObject = selectSliderElements(elementType)
		var nextElement = arrowDirection.hasClass("right-arrow") ? sliderElementObject.activeElement.next() : sliderElementObject.activeElement.prev()
		fadeOutImage(elementType, sliderElementObject)
		if(sliderElementObject.activeElement.is(sliderElementObject.list.last()) && arrowDirection.hasClass("right-arrow")){
			firstFadeInImage(elementType, sliderElementObject)
  		} else if(sliderElementObject.activeElement.is(sliderElementObject.list.first()) && arrowDirection.hasClass("left-arrow")){
  			lastFadeInImage(elementType, sliderElementObject)
  		} else{	
  			var elementAdded = nextElement.addClass(sliderElementObject.selector)
  			elementType == "image" ? elementAdded.fadeIn(fadeSpeed, function(){featureImageAnimationActive = false;}) : elementAdded
  		}
	}

	// ================================[Scroll Arrow Destinations Page]=======================================

	// homepage scroll show
	$(".scroll-arrow-homepage .scroll-arrow").hover(function(){
		console.log("hover home");
		var arrow = $(this);
		if(arrow.hasClass("active-animation")){return}
		arrow.addClass("active-animation");
		arrow.animate({
		    opacity: 0.5
		  }, 300, function() {
		    arrow.addClass("active-animation");
		    arrow.removeClass("skipped");
		  });
	},function(){
		var arrow = $(this)
		arrow.animate({
		    opacity: 0
		  }, 300, function() {
		    // Animation complete.
		    arrow.removeClass("active-animation");
		  });
	})


	// hover display arrows
	$(".scroll-arrow").hover(function(){
		console.log("rereereer")
		$(this).closest(".continent-group-slider-container").addClass("scroll-shadow", 300);

		var arrowContainer = $(this).closest($('.destination-scroll-arrows'));
		var isArrowLeft = $(this).hasClass("left-arrow");
		// $(this).closest(".destination-scroll-arrows").siblings(".continent-group-container").find(".link-screen").hide();
		// $(this).closest(".link-screen").addClass("active-fade-in");
		$(this).animate({
		    opacity: 0.7
		  }, 300, function() {
		    // arrow.addClass("active-animation");
		    // arrow.removeClass("skipped");
		  });
		if(isArrowLeft){
			$(this).addClass("slide-left");
		} else{
			// $(this).closest(".link-screen").hide();
			$(this).addClass("slide-right");
	  	}
	},
	function(){
		$(this).animate({
		    opacity: 0
		}, 300, function() {
		    // Animation complete.
		    // arrow.removeClass("active-animation");
		});
		$(this).removeClass("slide-right");
		$(this).removeClass("slide-left");
		// $(".link-screen").css("display", "inline-block");
	})




	$(".continent-arrows .scroll-arrow").on('click', function(){
		console.log("This one");
		var tile = $(this)
		
		if(tile.hasClass("active-animation")){
			return
		}else{
			tile.addClass("active-animation");
			var arrowContainer = $(this).closest($('.destination-scroll-arrows'));
			var rightArrow = arrowContainer.find(".right-arrow");
			var leftArrow = arrowContainer.find(".left-arrow");
			// debugger
			rightArrow.removeClass("slideArrowEnd");
			leftArrow.removeClass("slideArrowEnd"); 

			
			var sliderContainer = arrowContainer.siblings(".continent-group-container");
			var activeTile = sliderContainer.find('.active-destination');
			var siblings = activeTile.siblings();
			var sliderContainer = arrowContainer.siblings(".continent-group-container");
			// debugger
			var screenWidth = $(".destination-tile").width();
			var tileCount = sliderContainer.find(".destination-tile").length - 2;
			var containerLength = tileCount * screenWidth;
			var leftPos = sliderContainer.scrollLeft();
			var isArrowLeft = $(this).hasClass("left-arrow");
			if(isArrowLeft){
				sliderContainer.animate({scrollLeft: leftPos - screenWidth}, 1000, function(){
					tile.removeClass("active-animation");
				});	
			} else{
				sliderContainer.animate({scrollLeft: leftPos + screenWidth}, 1000, function(){
					tile.removeClass("active-animation");
				});
		  	}
		  	if(leftPos <= screenWidth + 20 && isArrowLeft){ leftArrow.addClass("slideArrowEnd"); }
			if(leftPos >= containerLength - 20 && !isArrowLeft){ rightArrow.addClass("slideArrowEnd"); }
		}
	})



	//container hover show arrows
	// $('.continent-group-slider-container').hover(function(){
	// 	console.log("yeeeeeeee")
	// 	console.log("rico")
	// 	var arrowsContainer = $(this).find(".destination-scroll-arrows");
	// 	arrowsContainer.addClass("hover");
	// 	arrowsContainer.fadeIn(300, function(){
	// 	arrowsContainer.removeClass("hover");
	// 	});
	// },
	// function(){
	// 	var arrowsContainer = $(this).find(".destination-scroll-arrows");
	// 	arrowsContainer.addClass("hover");
	// 	arrowsContainer.fadeOut(300, function(){
	// 		arrowsContainer.removeClass("hover");
	// 	});
	// })

	// destination tile hover hide date
	$(".region-widget-wrapper.destination-tile, .continent-group-slider-container").hover(function(){
		console.log("leggggooo")
		var tile = $(this)
		
		if(tile.hasClass("active-animation")){return}
		tile.addClass("active-animation");
		// debugger
		var tile = $(this)
		console.log("Hover Tile")
		tile.find(".tile-content p").animate({
		    opacity: 1
		  }, 300, function() {
		    tile.addClass("active-animation");
		  });
	},
	function(){
		var tile = $(this)
		tile.find(".tile-content p").animate({
		    opacity: 0
		  }, 300, function() {
		    // Animation complete.
		    tile.removeClass("active-animation");
		  });
			
	})


	// photography page
	$('.photo-grid-display').hover(function(){
		console.log("hey now")
		var arrowsContainer = $(this).find(".destination-scroll-arrows");
		arrowsContainer.addClass("hover");
		arrowsContainer.fadeIn(300, function(){
		arrowsContainer.removeClass("hover");
		});
	},
	function(){
		var arrowsContainer = $(this).find(".destination-scroll-arrows");
		arrowsContainer.addClass("hover");
		arrowsContainer.fadeOut(300, function(){
			arrowsContainer.removeClass("hover");
		});
	})



	$(".image-gallery-image").hover(function(){

		var tile = $(this)
		if(tile.hasClass("active-animation")){return}
		tile.addClass("active-animation");
		tile.find(".image-screen").animate({opacity: 0.5}, 400, );
		tile.find(".content-container").animate({opacity: 1},
		400, function() {
		    tile.addClass("active-animation");
		  });
	},
	function(){
		var tile = $(this)
		tile.find(".image-screen").animate({opacity: 0}, 400, );
		tile.find(".content-container").animate({opacity: 0}, 
			400, function() {
		    tile.removeClass("active-animation");
		  });

	});


	$(".image-display-arrows .scroll-arrow").hover(function(){
		// var destinationArrows = $(".image-display-arrows .scroll-arrow").closest($('.destination-scroll-arrows').siblings('.continent-group-container'));


		var destinationArrows = $(this).closest($('.destination-scroll-arrows'));
		var destinationContainer = destinationArrows.siblings('.grid-wrapper');


		//can remove
		// var rightArrow = destinationArrows.find(".right-arrow");
		// var leftArrow = destinationArrows.find(".left-arrow");
		// rightArrow.removeClass("slideArrowEnd");
		// leftArrow.removeClass("slideArrowEnd");



		var leftPos = destinationContainer.scrollLeft();
		var isArrowLeft = $(this).hasClass("left-arrow")
		var containerLength = $(".grid-wrapper").width();
		
		if(isArrowLeft){
			$(this).addClass("slide-left");
			destinationContainer.animate({scrollLeft: leftPos - 4000}, 5000);	
		} else{
			$(this).addClass("slide-right");
			destinationContainer.animate({scrollLeft: leftPos + 4000}, 5000);
	  	}
	 //  	if(leftPos == 0 && isArrowLeft){ leftArrow.addClass("slideArrowEnd"); }
		// if(leftPos >= containerLength && !isArrowLeft){ rightArrow.addClass("slideArrowEnd"); }

	},
	function(){
		$(this).removeClass("slide-right");
		$(this).removeClass("slide-left");
		$(".continent-group-container").stop();
		$(".continent-group-wrapper").removeClass("scroll-shadow", 300);
	})


	$(".image-screen").on("click", function(){
		var photoTile = $(this).closest(".image-gallery-image");
		var attrName = photoTile.attr("name");
		var selector = "article[name='" + attrName + "']";
		var heroCounterPart = $(".featured-image-slider-container").find(selector);
		var activeHero = $(".featured-image-slider-container").find(".active-img");
		var elementList = selectSliderElements("image")
		fadeOutImage("image", elementList)
		selectFadeInImage("image", elementList, selector)

		$('html, body').animate({
		    scrollTop: $("body").offset().top
		}, 400);
		clearInterval(setSliderInterval);
		setSliderInterval = setInterval(sliderAutoTransition, sliderTime);



		console.log(activeHero)
	})

	// featured Image Slider Scroll Arrows


	// nav stick
    var $mainMenu = $(".main-menu-class");
    var topOfNav = $mainMenu.offset().top;
    // $(window).resize(function(){
    //     console.log("resize");
    //     topOfNav = $mainMenu.offset().top;
    // });
    $(window).scroll(function() {
    	console.log("scroll")

        if($(window).scrollTop() >= 50) { //scrolled past the other div?
        	// debugger
        	// console.log(1)
            // $mainMenu.addClass('sticky-nav');
            // $("#menu-item-114 img").addClass('nav-img-resive');
            $("#menu-main-menu").addClass('nav-img-resive');
            
            // $("#menu-item-114 img").animate({width: '50px'}, 400);
            // $(".nav-bar-logo").css("display","initial");
            // $(".menu-item-home").css("display","none");
        }
        else{
        	// console.log(2)
            // $mainMenu.removeClass('sticky-nav');
            // $("#menu-item-114 img").animate({width: '80px'}, 400);
            // $("#menu-item-114 img").removeClass('nav-img-resive');
            $("#menu-main-menu").removeClass('nav-img-resive');
            // $(".nav-bar-logo").css("display","none");
            // $(".menu-item-home").css("display","initial");
        }
    });


    // Animation test section
        
$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() > $(document).height() - 120) {
       console.log("HIIIIIIIIIIIIII")
       var socialIcons = $(".footer-right").children().find("img").each(function(){ $(this).addClass('fadeInLeft'); });
   }

   // Homepage Screen Fade
   $(".hero-content-screen > .hero-content-wrapper").animate({opacity: 0}, 750);
   $(".hero-content-screen").animate({opacity: 0.25}, 750);
});

$(".mobile-menu-button").on("click", function(){
	if($(this).hasClass("clicked")){
		$(this).removeClass("clicked")
		$("#menu-main-menu").removeClass("active-nav-menu")
	}else{
		$(this).addClass("clicked")
		$("#menu-main-menu").addClass("active-nav-menu")

	}
	
})
$(".map-mobile-scroll-arrow").on("click", function(){
	$([document.documentElement, document.body]).animate({
        scrollTop: $(".content").offset().top
    }, 1000);

})






});

