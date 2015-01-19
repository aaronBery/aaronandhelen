var w = window;
var animeTimerInterval = 5000;

define(["jquery"],
    function($){
        function showGimic(){
            $('#fairy').css(
                {
                    display: "block"
                    ,left: "0"
                    ,top: "0"
                }
            )
            $('#bear').css(
                {
                    display: "block"
                    ,left: "0"
                    ,bottom: "0"
                }
            )
            animateGimic();
        }
        function animeController(){
            setTimeout(
                function(){
                    showGimic();
                }, animeTimerInterval
            );
        }
        function animateGimic() {
            $('#fairy').animate({
                left: "668px"
                ,top: "65px"
            }
            ,5000 
            ,function() {
                $('#fairy').hide("slow");
                $('#bear').hide("slow");
                animeController();
            });
        }
        $(document).ready(function(){
            showGimic();
        });
    }
);