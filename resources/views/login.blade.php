<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Aplikasi Management Bimbel prestasi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
            background-image: url('{{ asset('bg.jpg') }}');
            background-size: cover; /* Adjust as needed */
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container-rectangle {
            width: 1070px; /* Adjusted width for responsiveness */
            height: 395px;
            background-color: white;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: row; /* Adjusted to display elements horizontally */
            justify-content: center;
            align-items: center;
        }

        .form-container {
            width: 60%; /* Adjusted to full width */
            padding-left: 20px; /* Added padding for separation */
            border-left: 1px solid #ccc;
        }

        .login-button {
            width: 40%;
            margin-top: 20px;
        }

        .logo {
            width: 300px; /* Set the width explicitly */
            height: 205px; /* Set the height explicitly */
            max-width: 100%; /* Make sure the logo doesn't exceed its container */
            max-height: 100%; /* Adjust the max height as needed */
        }
    </style>
</head>
<body>
    <div class="container-rectangle">
        <img src="{{ asset('logo.png')}}" alt="Logo" class="logo">
        <div class="form-container">
            <div class="col-md-12">
                <h2 class="text-center"><b></b><br></h3>
                <hr>
                @if(session('error'))
                <div class="alert alert-danger">
                    <b>Opps!</b> {{session('error')}}
                </div>
                @endif
                <form action="{{ route('actionlogin') }}" method="post">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block login-button">Log In</button>
                    <hr>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>
