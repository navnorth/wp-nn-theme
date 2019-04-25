jQuery(document).ready(function($){
    $('.tc-search-form').on("mouseover", function(){
        $(this).addClass('focus');
        $('.tc-search-field').addClass("show");
    });
});