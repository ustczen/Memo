$(document).ready(function(){
    $('.editEntry').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var parent = $(this).parents('.entry');
        parent.find('.entryContent').hide();
        parent.find('.entryForm').show();
    });

    $('.closeEdit').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        $(this).parents('.entryForm').hide();
        $(this).parents('.entry').find('.entryContent').show();
    });
});