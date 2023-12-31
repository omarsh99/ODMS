<link rel="stylesheet" type="text/css" href="{{ url('/css/desk_create.css') }}" />



<h1>Create new Desk</h1>
<div class="form-container">
    <form method="POST" action="/desks">
        @csrf
        <input type="text" name="name" id="name" placeholder="Desk Name">
        <input type="text" name="symbol" id="symbol" placeholder="Symbol">
        <input type="number" name="position_x" id="position_x" placeholder="Position X">
        <input type="number" name="position_y" id="position_y" placeholder="Position Y">
        <select name="category_id" id="category_id">
            <option value="">Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit">Create Desk</button>
    </form>
</div>
<a href="/">Back</a>
