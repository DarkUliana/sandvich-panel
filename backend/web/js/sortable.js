   var sortable = function() {
       $('tbody', '#mainGrid').sortable({
            update: function(event, ui) {
                // Assigns table tag
                var table = $(this).closest('table');
                // Collect data
                var data = {};
                var index = 1;
                table.find('tbody tr').each(function() {
                    data['positions[' + $(this).data('key') + ']'] = index;
                    ++index;
                });
                
                // Send request
                $.post(table.data('sort-url'), data);
            }
       });
   };

    $(document).ready(function() {
        sortable();
    });

    $(document).on('pjax:end', function() {
        sortable();
    });
