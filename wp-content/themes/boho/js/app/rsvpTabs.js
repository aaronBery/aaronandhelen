define(["jquery"],
    function($) {
        var currentTab = 0;
            
        function removeAllCurrentTabs(){
            $('.rsvp-group--inner-listing,li.rsvp-group--tab').each(function(){
                $(this).removeClass("current");
            });
        }
        function addCurrentTab(currentTabNum) {
            $('.rsvp-group--inner-listing,li.rsvp-group--tab').each(function(){
                if(parseInt($(this).attr('data-num'))===currentTabNum){
                    $(this).addClass("current");
                    
                }
            });
        }

        $(document).ready(function(){
            $('li.rsvp-group--tab').click(function(){
                var newTab = parseInt($(this).attr("data-num"));
                //console.log(newTab);
                removeAllCurrentTabs();
                addCurrentTab(newTab);
            });
        });
    }
);