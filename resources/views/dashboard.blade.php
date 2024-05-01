<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@if(Session::has('success'))
  <div>{{Session::get('success')}}</div>
@endif
    <h1>Dashboard</h1>
    <a href="{{route('login')}}">logOut</a>
</body>
</html>