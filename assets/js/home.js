$(document).ready(function(){
    $("#jadwal").carousel();
    $(".left").click(function(){
        $("#jadwal").carousel("prev");
    });
    $(".right").click(function(){
        $("#jadwal").carousel("next");
    });
});
$(document).ready(function(){
    $("#epSlide").carousel();
});
$(document).ready(function(){
    $("#topPemain").carousel();
    $(".left").click(function(){
        $("#topPemain").carousel("prev");
    });
    $(".right").click(function(){
        $("#topPemain").carousel("next");
    });
});
$(window).scroll(function(){
    if ($(window).scrollTop() >= 72) {
    $('.menu').addClass('fixed-header');
    $('nav').addClass('h-142');
    $('.x-m ul ul').addClass('t-65');
    $('.searchbox').addClass('t-65');
    }
    else {
    $('.menu').removeClass('fixed-header');
    $('nav').removeClass('h-142');
    $('.x-m ul ul').removeClass('t-65');
    $('.searchbox').removeClass('t-65');
    }
});
var srcbox = document.getElementById('srcbox');
var src = document.getElementById("src");
var srcS = document.getElementById("srcSub");
var close = document.getElementsByClassName("close")[0];
src.onclick = function() {
    srcbox.style.display = "block";
}
srcS.onclick = function() {
    srcbox.style.display = "none";
}
close.onclick = function() {
    srcbox.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == srcbox) {
        srcbox.style.display = "none";
    }
}