$(document).ready(function(){
    $('.editMemo').click(function(e){
        var parent = $(this).parents('.memo');
        parent.find('.memoContent').hide();
        parent.find('.memoForm').show();
    });

    $('.closeEdit').click(function(e){
        $(this).parents('.memoForm').hide();
        $(this).parents('.memo').find('.memoContent').show();
    });
});