var sending = false;

$(document).ready(function() {
    new WOW().init();
});

$(document).on('click', '.ownbox-show', function(e){
    e.preventDefault();

    own_box_show($(this).attr('href'));
}).on('click', '.ajax-submit', function(e){
    e.preventDefault();
    e.stopPropagation();
    
    if (sending) {
        return;
    }
    
    sending = true;
    
    var self = $(this),
        form = self.closest('form');
    
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method').toUpperCase()  || 'POST',
        data: form.serialize(),
    }).done(function(response){
        sending = false;
        
        if ('status' in response && response.status) {
            own_box_show('/result');
        }
    }).error(function(error) {
        sending = false;
    });
});