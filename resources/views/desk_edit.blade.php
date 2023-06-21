<form method="POST" action="{{ route('desks.update', $desk->id) }}">
    @csrf
    @method('PATCH')
    <input type="text" name="name" placeholder="Desk Name">
    <input type="text" name="symbol" placeholder="Symbol">
    <button type="submit">Update Desk</button>
</form>
