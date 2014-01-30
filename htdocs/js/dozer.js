jQuery(document).ready(function(){
    jQuery('.controls .btn').bind('click', function(e){
        var button = jQuery(this);
        e.preventDefault();
        jQuery.get(button.attr('href'));
    })
});