<form method="POST" action="/desks">
    @csrf
    <input type="text" name="name" placeholder="Desk Name">
    <input type="text" name="symbol" placeholder="Symbol">
    <input type="number" name="position_x" id="position_x">
    <input type="number" name="position_y" id="position_y">
    <button type="submit">Create Desk</button>
</form>
