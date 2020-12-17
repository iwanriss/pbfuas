<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>
<body>
    <form action="{{url('/forgot_password') }}" method="post">
        {{ csrf_field() }}

        @if(session('eror'))
            <div>
            {{session('eror') }}
            </div>
        @endif

        @if(session('success'))
            <div>
            {{session('success') }}
            </div>
        @endif
        
        
        <input type="email" name="email" id="email">
        <button type="submit">Submit  </button>
    </form>
</body>
</html>