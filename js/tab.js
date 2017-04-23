$(function(){
    for(var i = 0;i < $('.left li').length;i++ ){
        $('.left li').eq(i).click(function(){
            $('.left li').css('background','deepskyblue');
            $(this).css('background','orange');
            $('.right>li').eq($(this).index()).css('display','block').siblings('.right>li').css('display','none');
        });
    }
    $('.qiehuan').click(function(){
        $.cookie('user',null);
        window.location.href = 'login.php';
    });
});
