var w = window;
var carouselTimer = 5000;

define(["jquery"],
    function($,w) {
        var currentSlide = 0

        $('img.carousel--element,.carousel--arrows').hover(function(){
            $('.carousel--arrows').show();
        });
        $('img.carousel--element').mouseout(function(){
            $('.carousel--arrows').hide();
        });

    	function scroll(newSlide){
            currentSlide = newSlide;
            if(currentSlide >= SLIDE_COUNT){
                currentSlide = 0;
            }
            $('img.carousel--element').each(function(){
                $(this).removeClass('carousel--current');
                if(parseInt($(this).attr('data-count'))===currentSlide){
                    $(this).addClass('carousel--current');
                }
            });
        }

        if(typeof SLIDE_COUNT !== 'undefined'){
             $('.carousel--arrow--left').click(function(){
                currentSlide--;
                if(currentSlide < 0){
                    currentSlide = SLIDE_COUNT -1;
                }
                scroll(currentSlide);
            });
            $('.carousel--arrow--right').click(function(){
                currentSlide++;
                if(currentSlide >= SLIDE_COUNT -1){
                    currentSlide = 0;
                }
                scroll(currentSlide);
            });
        }

        /*
    	function scroll(){

            currentSlide++;
            if(currentSlide >= SLIDE_COUNT){
                currentSlide = 0;
            }
            $('img.carousel--element').each(function(){
                $(this).removeClass('carousel--current');
                if(parseInt($(this).attr('data-count'))===currentSlide){
                    $(this).addClass('carousel--current');
                }
            });

        }
        if(typeof SLIDE_COUNT !== 'undefined'){
    		setInterval(function(){
	    		scroll();
	    	},carouselTimer);
    	}*/
    }
);