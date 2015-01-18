var w = window;
var animeTimerInterval = 5000;
var flowersSelector = "img.flowers";

define(["jquery"],
    function($){
        $(document).ready(function(){
            function toggleFlowers(){
                $(flowersSelector).each(function(){
                    $(this).toggle("slow");
                });
            }
            function flowerTimer(){
                 w.setInterval(
                    function(){
                        toggleFlowers();
                    }, animeTimerInterval
                );
            }
           flowerTimer();
        });
    }
);