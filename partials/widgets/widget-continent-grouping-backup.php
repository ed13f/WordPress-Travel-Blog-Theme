<article class="continent-group <?php echo($class_to_add ? $class_to_add : ''); ?>">
	<div class="continent-group-content">
		<div class="continent-group-content-container">
			<h2><?php echo $continent_name ?></h2>
			<div class="destination-content"><?php the_content();?></div>
		</div>
	</div>
	<div class="continent-group-slider-container">
		<div class="continent-group-wrapper">
			<?php partial('widgets.destination-scroll-arrows'); ?>
			<div class="continent-group-container">
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
					  if( ( $query->current_post + 1 ) == $query->post_count ){ $class .= ' last'; }
					  if( $query->current_post == 0){ $class .= ' first'; } ?>


					<div class="<?php echo $class; ?>" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
						<a class="link-screen" href="<?php the_permalink(); ?>"></a>
						<div class="date"><?php echo get_the_date("F / y"); ?></div>
						<h3 class="tile-title"><?php the_title(); ?></h3> 
					</div>
					<?php $class = "destination-tile continent-group-tile"; ?>
				<?php endwhile; endif; ?>
			</div>
		<div>
	</div>		
</article>






<!-- ==========================================================LESS========================================================== -->



article.continent-group{
	display:flex;
	.max-width();
	width:100vw;
	padding:0 2%;
	// margin:40px auto;
	&.flip{
		flex-direction: row-reverse;
		// & .destination-content{
		// 	padding-left: 4%;
		// 	padding-right:0 !important;
		// }
		// & h2{
		// 	padding-left: 4%;
		// 	padding-right: 0% !important;
		// }
		// & .continent-group-wrapper{
		// 	padding-left: 4%;
		// }
	}	
	& .continent-group-content{
		flex:2;
		.continent-group-content-container{
			padding: 50px 3vw 30px;
			& h2{
				text-align:center;
				padding-right: 2%;
			}
			& .destination-content{
				max-height: 165px;
	    		overflow: hidden;
	    		padding-right: 2%;
			}
		}	
	}
	& .continent-group-slider-container{
		flex:3;
		position:relative;
		width:1px;
		-ms-overflow-style: none;
		overflow: -moz-scrollbars-none;
		overflow-x: hidden;
		overflow-y: overlay;
		& ::-webkit-scrollbar { 
		    display: none; 
		    height:0px;
		}
		& .continent-group-wrapper{
			padding-right:2%;
			position:relative;
			& .scroll-shadow{
				position:relative;
				width:100%;
			}
			& .continent-group-container{
				height: 350px;
				text-align:center;
				overflow: scroll;
				overflow-y: hidden;
				white-space: nowrap;
				position:relative;
			}	

		}
	}	

}



<!-- =================================================== single destination tile ====================================================== -->



.destination-tile{
	position:relative;
	background-size: cover;
	background-repeat: no-repeat;
	// height:350px;
	// height:250px;
	height:100%;
	&.region-widget-wrapper{
		// position:relative;
		// height:250px;
		text-align:center;
		margin:0 3% 0 0;
		width: 32%;
		// background-size: cover;
	}


	&.continent-group-tile{
		display:inline-block;
		// width:300px;
		width:57vw;
		max-width:645px;
		overflow:scroll;
		margin:0 10px;
	}
	a.link-screen{
		z-index: 1;
	    position: absolute;
	    height: 100%;
	    width: 100%;
	    left: 0;
	    top:0;
	    background-color:@color-7;
	    opacity:0.4;
	    &.active-fade-in{
			opacity:0;
			z-index: 4;
		}
	}
	& h3.tile-title{
		margin-top:70px;
		z-index:3;
		position:relative;
		color:@color-6;
		&.active-title{
			opacity:0.25;
		}
	}

	& .date{
		position: absolute;
	    color: black;
	    font-size: 20px;
	    line-height: 20px;
	    top: 0;
	    left: 0;
	    z-index:3;
	    background-color: lightgrey;
	    padding: 12px;
	    opacity: .7;
	}
	&.first{
		margin-left: 0;
	}
	&.last{
		margin-right:0;
	}
}


<!-- ========================================= Scroll Script ========================================================== -->



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

