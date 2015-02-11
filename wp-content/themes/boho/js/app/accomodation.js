define(["jquery"],
    function($){
        $(document).ready(function(){
            var currentTab = -1;
            function closeAllTabs(){
                $('.tab--content').each(function(){
                    $(this).removeClass('current');
                });           
            }
            function openTab(){
                //console.log(currentTab);
                $('.tab--content').each(function(){
                    var tmpNum = parseInt($(this).attr('data-num'));
                    if(tmpNum===currentTab){
                        console.log($(this).attr('data-num'));
                        $(this).addClass("current");   
                    }
                });
            }
            $('.tab--item h3').click(function(){
                var newTab = parseInt($(this).attr('data-num'));
                closeAllTabs();
                if(newTab!==currentTab){
                    currentTab = newTab;
                    openTab();
                }
            });
        });
    }
);