<head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/index.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <script src="{{ url('/js/index.js') }}"></script>
    <title>Office Desk Mapping System</title>
</head>

@if (Session::has('loginId'))
    <div class="user">
        <h1>Welcome to your profile {{$data->name}}!</h1>
    </div>
@endif

<div id="map">
    @foreach ($desks as $desk)
        <div class="desk" data-desk-id="{{ $desk->id }}" style="left: {{ $desk->position_x }}px; top: {{ $desk->position_y }}px; height: {{ $desk->height }}px; width: {{$desk->width}}px;">
            <div class="symbol">{{ $desk->symbol }}</div>
            <div class="name">{{ $desk->name }}</div>
            <input type="hidden" name="position_x" value="{{ $desk->position_x }}">
            <input type="hidden" name="position_y" value="{{ $desk->position_y }}">
            <input type="hidden" name="height" value="{{ $desk->height }}">
            <input type="hidden" name="width" value="{{ $desk->width }}">
        </div>
    @endforeach
</div>

<div>
    @if (!Session::has('loginId'))
        <a class="button" href="/login">Login</a>
    @else
        <a class="button" href="/categories/">Categories</a>
        <a class="button" href="/desks/create">Add Desk</a>
        <a class="button" href="/desks">View All</a>
        <a class="button" href="/logout">Logout</a>
    @endif
</div>

