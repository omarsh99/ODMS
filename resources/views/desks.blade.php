<link rel="stylesheet" type="text/css" href="{{ url('/css/desks.css') }}" />

<h1>All Desks</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Symbol</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($desks as $desk)
            <tr>
                <td>{{ $desk->name }}</td>
                <td>{{ $desk->symbol }}</td>
                <td>
                    <a href="{{ route('desks.edit', $desk->id) }}">Edit</a>
                </td>
                <td>
                    <form method="POST" action="{{ route('desks.destroy', $desk->id) }}" onsubmit="return confirm('Are you sure you want to delete this desk?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a class="back" href="/">Back</a>
