$(function(){
    for(var i = 0;i < $('.sort li').length;i++ ){
        $('.sort li').eq(i).click(function(){
            $('.sort li').css('background','deepskyblue');
            $(this).css('background','orange');
            $('.book').eq($(this).index()).css('display','block').siblings('.book').css('display','none');
        });
    }
});
