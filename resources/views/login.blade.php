
@if(Session::has('success'))
  <div>{{Session::get('success')}}</div>
@endif
<form method="POST" action="{{ route('user.login') }}">
    @csrf

    <div>
        <label for="email">Email</label>
        <input id="email" type="text" name="email"  autofocus value="{{old('email')}}">
        <span style="color: red;">@error('email') {{$message}}  @enderror</span>
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" >
        <span style="color: red;">@error('password') {{$message}}  @enderror</span>
    </div>

    <div>
        <button type="submit">Login</button>
    </div>
</form>
