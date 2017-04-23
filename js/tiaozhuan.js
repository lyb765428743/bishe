$(function(){
    if($.cookie('user') == 'null' || !$.cookie('user')){
        window.location.href = "login.php";
    }
})