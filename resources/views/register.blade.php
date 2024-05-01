<form method="POST" action="{{ route('user.register') }}">
    @csrf

    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" required autofocus value="{{old('name')}}">
        <span style="color: red;">@error('name')  {{$message}} @enderror</span>
    </div>

    <div>
        <label for="email">Email</label>
        <input id="email" type="text" name="email" required autofocus value="{{old('email')}}">
        <span>@error('email') {{$message}} @enderror</span>
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        <span>@error('password') {{$message}}  @enderror</span>
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>

