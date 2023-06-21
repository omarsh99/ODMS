

<div id="map">
    @foreach ($desks as $desk)
        <div class="desk" data-desk-id="{{ $desk->id }}" style="left: {{ $desk->position_x }}px; top: {{ $desk->position_y }}px;">
            <div class="symbol">{{ $desk->symbol }}</div>
            <div class="name">{{ $desk->name }}</div>
            <input type="hidden" name="position_x" value="{{ $desk->position_x }}">
            <input type="hidden" name="position_y" value="{{ $desk->position_y }}">
        </div>
    @endforeach
</div>

<style>
    #map {
        position: relative;
        width: 500px;
        height: 500px;
        border: 1px solid #ccc;
    }

    .desk {
        position: absolute;
        width: 50px;
        height: 50px;
        background-color: #f1f1f1;
        border: 1px solid #ddd;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
<script>
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
                    _token: '{{csrf_token()}}'
                },
                success: function(response) {
                    console.log('Desk position updated successfully');
                },
                error: function(error) {
                    console.log('Error updating desk position');
                }
            });
        }
    });

</script>
