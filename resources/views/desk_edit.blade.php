<link rel="stylesheet" type="text/css" href="{{ url('/css/desk_create.css') }}" />

<h1>Update new Desk</h1>
<div class="form-container">
    <form method="POST" action="{{ route('desks.patch', $desk->id) }}">
        @csrf
        @method('PATCH')
        <input type="text" name="name" placeholder="Desk Name">
        <input type="text" name="symbol" placeholder="Symbol">
        <button type="submit">Update Desk</button>
    </form>
</div>
<a href="/">Back</a>
