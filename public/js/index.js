$(document).ready(function() {
    $('.desk').draggable({
        containment: '#map',
        stop: function(event, ui) {
            var position = ui.position;
            var desk = $(this);
            var position_x = position.left;
            var position_y = position.top;
            desk.find('input[name="position_x"]').val(position_x);
            desk.find('input[name="position_y"]').val(position_y);

            // Get the desk ID from the data-desk-id attribute
            var deskId = desk.data('desk-id');

            // Send AJAX request to update the desk's position in the database
            $.ajax({
                url: '/desks/' + deskId,
                method: 'PUT',
                data: {
                    position_x: position_x,
                    position_y: position_y,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    console.log('Desk position updated successfully');
                },
                error: function() {
                    console.log('Error updating desk position');
                }
            });

        }
    }).resizable({
        containment: '#map',
        handles: 'n, e, s, w, ne, se, sw, nw',
        resize: function(event, ui) {
            var desk = $(this);
            var position = ui.position;
            var width = ui.size.width;
            var height = ui.size.height;
            desk.find('input[name="position_x"]').val(position.left);
            desk.find('input[name="position_y"]').val(position.top);
            desk.css({ width: width, height: height });

            var deskId = desk.data('desk-id');

            // Send AJAX request to update the desk's position in the database
            $.ajax({
                url: '/desks/' + deskId,
                method: 'PUT',
                data: {
                    height: height,
                    width: width,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    console.log('Desk dimensions updated successfully');
                },
                error: function() {
                    console.log('Error updating desk dimensions');
                }
            });
        }
    });
});
