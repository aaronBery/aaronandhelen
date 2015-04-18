define(["jquery","facebox"],
    function($) {
        /*var domain = "aaronandhelen.com";
        if(document.URL.indexOf('local') > -1){
            domain = "aaronandhelen.local";
        }
    	var prefs = 'highcontrast=false;domain=' + domain;

    	if(typeof document.cookie!=='undefined'){
    		prefs = document.cookie;
    	}
    	if(prefs.indexOf('highcontrast=true')>-1){
    		addMode('.high-contrast','.normal-contrast');
    	}*/

    	/*$('.high-contrast,.normal-contrast').each(function(){
    		$('.menu ul').append($(this));
    	});*/

    	function addMode(show,hide){
			if(show==='.high-contrast'){
				$('body').addClass('high-contrast-mode');
			}else{
				$('body').removeClass('high-contrast-mode');
			}
	    		
    		//document.cookie="highcontrast=true";
    		
    		//this is back to front as button show toggle option
    		$(show).hide();
    		$(hide).show();
    	}

    	$('.high-contrast').click(function(){
            //document.cookie="";
    		addMode('.high-contrast','.normal-contrast');
    		//document.cookie="highcontrast=true;domain=" + domain;
    	});

    	$('.normal-contrast').click(function(){
            //document.cookie="";
    		addMode('.normal-contrast','.high-contrast');
    		//document.cookie="highcontrast=false;domain=" + domain;
    	});

        /*lightbox
        --------------------------------------------------------------------------*/
        $('.lightbox').each(function(){
            $(this).click(function(e){
                console
                $.facebox('<img src="' + $(this).parent().attr('href') + '" />');
                e.preventDefault();
            });
        });


        $('.hamburger img').click(function(){
            $('#mobile-header .menu,.header__close').show();
            $('.hamburger').hide();
        });
        $('.header__close').click(function(){
            $('#mobile-header .menu,.header__close').hide();
            $('.hamburger').show();
        });
   }
);