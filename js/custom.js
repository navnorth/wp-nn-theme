jQuery(document).ready(function($){
    $('.tc-search-bg').on("click", function(){
        $('.tc-search-form').addClass('focus');
        $('.tc-search-field').css('width', '120px').focus();
        $(this).hide();
    });
});