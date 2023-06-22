<link rel="stylesheet" type="text/css" href="{{ url('/css/login.css') }}" />

<form action="{{route('login-user')}}" method="post">
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    @csrf
    <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter email" name="email" value="{{old('email')}}" required>
        <span>@error('email') {{$message}} @enderror</span>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <span>@error('password') {{$message}} @enderror</span>

        <button type="submit">Login</button>
        <p>Don't have an account? <a href="/register">Register here!</a></p>
    </div>
</form>

