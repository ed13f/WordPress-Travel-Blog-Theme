$(document).ready(function(){
	// ================================[sections/featured-image-slider]=======================================
	//slider Utility Functions
	function selectSliderElements(elementType){
		var sliderContainer = $(".featured-image-slider-container")
		sliderContainer.find(".first-image").removeClass("first-image")
		var list = elementType == "image" ? sliderContainer.children(".slider-image-wrapper") : $(".slider-tracking-container").children(".slider-dot")
		var activeElement = elementType == "image" ? sliderContainer.find(".active-img") : sliderContainer.find(".active-dot")
		var selector = elementType == "image" ? "active-img" : "active-dot"
		var sliderElementObject = { sliderContainer: sliderContainer, list: list, activeElement: activeElement, selector: selector }
		return sliderElementObject
	}

	var fadeSpeed = 1000
	function fadeOutImage(elementType, sliderElementObject){
		var removeElement = sliderElementObject.activeElement.removeClass(sliderElementObject.selector)
		elementType == "image" ? removeElement.fadeOut(fadeSpeed) : removeElement
	}
	function firstFadeInImage(elementType, sliderElementObject){
		var addElement = sliderElementObject.list.first().addClass(sliderElementObject.selector)
		elementType == "image" ? addElement.fadeIn(fadeSpeed) : addElement
	}
	function lastFadeInImage(elementType, sliderElementObject){
		var addElement = sliderElementObject.list.last().addClass(sliderElementObject.selector)
		elementType == "image" ? addElement.fadeIn(fadeSpeed) : addElement
	}
	function nextFadeInImage(elementType, sliderElementObject){
		var addElement = sliderElementObject.activeElement.next().addClass(sliderElementObject.selector)
		elementType == "image" ? addElement.fadeIn(fadeSpeed) : addElement
	}
	function dotFadeIn(elementType, sliderElementObject, index){
		var addElement = $(sliderElementObject.list.get(index)).addClass(sliderElementObject.selector)
		elementType == "image" ? addElement.fadeIn(fadeSpeed) : addElement
	}
	function selectFadeInImage(elementType, sliderElementObject, select){
		var addElement = sliderElementObject.sliderContainer.find(select).addClass(sliderElementObject.selector)
		elementType == "image" ? addElement.fadeIn(fadeSpeed) : addElement
	}

	// slider interval rotation
	var sliderTime = 10000
	var setSliderInterval = setInterval(sliderAutoTransition, sliderTime);

	function sliderAutoTransition(){
		determineAutoTransitionElement("image")
		determineAutoTransitionElement("dot")
	}

	function determineAutoTransitionElement(elementType){
		var elementList = selectSliderElements(elementType)
		fadeOutImage(elementType, elementList)
		if(elementList.activeElement.is(elementList.list.last())){
			firstFadeInImage(elementType, elementList)
  		} else{
  			nextFadeInImage(elementType, elementList)
  		}
	}

	// slider dot click rotation
	function dotClicktransition(elementType, indexClickedDot){
		var sliderElementObject = selectSliderElements(elementType)
		fadeOutImage(elementType, sliderElementObject)
		dotFadeIn(elementType, sliderElementObject, indexClickedDot)
	}

	$(".slider-dot").on("click", function(){
		var index = $(".slider-dot").index($(this))
		dotClicktransition("image", index)
		dotClicktransition("dot", index)
		clearInterval(setSliderInterval);
		setSliderInterval = setInterval(sliderAutoTransition, sliderTime);
	})

	// slider arrow click rotation
	$(".slider-arrow").on( "click", function() {
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
  			elementType == "image" ? elementAdded.fadeIn(fadeSpeed) : elementAdded
  		}
	}

	// ================================[Scroll Arrow Destinations Page]=======================================
	// hover display arrows
	$(".scroll-arrow").hover(function(){
		console.log("yahhoooooo");

		$(this).closest(".continent-group-wrapper").addClass("scroll-shadow", 300);
		var arrowContainer = $(this).closest($('.destination-scroll-arrows'));
		var destinationContainer = arrowContainer.siblings('.continent-group-container');
		var leftPos = destinationContainer.scrollLeft();
		var isArrowLeft = $(this).hasClass("left-arrow")
		if(isArrowLeft){
			$(this).addClass("slide-left");
			destinationContainer.animate({scrollLeft: leftPos - 4000}, 5000);	
		} else{
			$(this).addClass("slide-right");
			destinationContainer.animate({scrollLeft: leftPos + 4000}, 5000);
	  	}
	},
	function(){
		$(this).removeClass("slide-right");
		$(this).removeClass("slide-left");
		$(".continent-group-container").stop();
		$(".continent-group-wrapper").removeClass("scroll-shadow", 300);
	})

	//container hover show arrows
	$('.continent-group-wrapper').hover(function(){
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
	// destination tile hover hide date
	$(".destination-tile").hover(function(){
		var tile = $(this)
		tile.find(".date").fadeOut(500);
		// tile.find(".tile-title").addClass("active-date").fadeOut(300);
		tile.find(".tile-title").animate({
		    opacity: 0.35
		  }, 500, function() {
		    // Animation complete.
		  });
		tile.find(".link-screen").addClass("active-fade-in", 500);
	},
	function(){
		var tile = $(this)
		tile.find(".date").removeClass("active-date").fadeIn(500);
		// tile.find(".tile-title").removeClass("active-date").fadeIn(300);
		tile.find(".tile-title").animate({
		    opacity: 1
		  }, 500, function() {
		    // Animation complete.
		  });
		tile.find(".link-screen").removeClass("active-fade-in", 300);
	})
	// photography page
	$(".image-gallery-image").hover(function(){
		$(this).find(".image-screen").css("opacity", "0.25");
		$(this).find(".image-screen").siblings("h2").show();
	},
	function(){
		$(this).find(".image-screen").css("opacity", "0");
		$(this).find(".image-screen").siblings("h2").hide();
	});

	$(".image-screen").on("click", function(){
		var photoTile = $(this).closest(".image-gallery-image");
		var attrName = photoTile.attr("name");
		var selector = "div[name='" + attrName + "']";
		var heroCounterPart = $(".featured-image-slider-container").find(selector);
		var activeHero = $(".featured-image-slider-container").find(".active-img");


		var elementList = selectSliderElements("image")
		// debugger
		fadeOutImage("image", elementList)
		selectFadeInImage("image", elementList, selector)
		// debugger

		// activeHero.hide().removeClass("active-img");
		// heroCounterPart.show().addClass("active-img");

		$('html, body').animate({
		    scrollTop: $(".photography").offset().top
		}, 400);
		clearInterval(setSliderInterval);
		setSliderInterval = setInterval(sliderAutoTransition, sliderTime);



		console.log(activeHero)
	})


	// nav stick
    var $mainMenu = $("#menu-main-menu");
    var topOfNav = $mainMenu.offset().top;
    // $(window).resize(function(){
    //     console.log("resize");
    //     topOfNav = $mainMenu.offset().top;
    // });
    $(window).scroll(function() {
        if($(window).scrollTop() >= topOfNav +25) { //scrolled past the other div?
            $mainMenu.addClass('sticky-nav');
            // $(".nav-bar-logo").css("display","initial");
            // $(".menu-item-home").css("display","none");
        }
        else{
            $mainMenu.removeClass('sticky-nav');
            // $(".nav-bar-logo").css("display","none");
            // $(".menu-item-home").css("display","initial");
        }
    });

















});

