<link rel="stylesheet" type="text/css" href="{{ url('/css/desks.css') }}" />

<h1>All Categories</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <form method="POST" action="{{ route('category.destroy', $category->id) }}" onsubmit="return confirm('Are you sure you want to delete this category?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a class="back" href="/categories/create">New</a>
<a class="back" href="/">Back</a>
