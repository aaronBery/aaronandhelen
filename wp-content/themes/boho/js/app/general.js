define(["jquery"],
    function($) {
        var domain = "aaronandhelen.com";
        if(document.URL.indexOf('local') > -1){
            domain = "aaronandhelen.local";
        }
    	var prefs = '';
    	if(typeof document.cookie!=='undefined'){
    		prefs = document.cookie;
    	}
    	if(prefs.indexOf('highcontrast=true')>-1){
    		addMode('.high-contrast','.normal-contrast');
    	}

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
    		addMode('.high-contrast','.normal-contrast');
    		document.cookie="highcontrast=true;domain=" + domain;
    	});

    	$('.normal-contrast').click(function(){
    		addMode('.normal-contrast','.high-contrast');
    		document.cookie="highcontrast=false;domain=" + domain;
    	});
   }
);