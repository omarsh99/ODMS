<link rel="stylesheet" type="text/css" href="{{ url('/css/desk_create.css') }}" />


<h1>Create new category</h1>
<div class="form-container">
    <form method="POST" action="/categories">
        @csrf
        <input type="text" name="name" id="name" placeholder="Category Name">
        <button type="submit">Create category</button>
    </form>
</div>
<a href="/categories">Back</a>
