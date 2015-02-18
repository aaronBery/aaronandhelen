define(["jquery"],
    function($) {
    	if(typeof document.cookie.highcontrast!=='undefined' && document.cookie.highcontrast==="true"){

    	}

    	$('.high-contrast,.normal-contrast').each(function(){
    		$('.menu ul').append($(this));
    	});

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
    		addMode('.high-contrast','.normal-contrast');
    	});

    	$('.normal-contrast').click(function(){
    		addMode('.normal-contrast','.high-contrast');
    	});
   }
);