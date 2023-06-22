<link rel="stylesheet" type="text/css" href="{{ url('/css/login.css') }}" />

<form action="{{route('register-user')}}" method="post">
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    @csrf

    <div class="container">
        <h1>Register</h1>
        <hr>

        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter name" name="name" id="name" value="{{old('name')}}" required>
        <span>@error('name') {{$message}} @enderror</span>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" value="{{old('email')}}" required>
        <span>@error('email') {{$message}} @enderror</span>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
        <span>@error('password') {{$message}} @enderror</span>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
        <hr>

        <button type="submit" class="registerbtn">Register</button>
        <p>Already have an account? <a href="/login">Sign in</a>.</p>
    </div>


</form>
