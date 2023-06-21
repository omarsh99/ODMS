<form method="POST" action="{{ route('desks.patch', $desk->id) }}">
    @csrf
    @method('PATCH')
    <input type="text" name="name" placeholder="Desk Name">
    <input type="text" name="symbol" placeholder="Symbol">
    <button type="submit">Update Desk</button>
</form>

<h1>Or delete</h1>
<form method="POST" action="{{ route('desks.destroy', $desk->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete Desk!</button>
</form>
