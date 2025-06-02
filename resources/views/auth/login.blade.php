<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Adminka</title>
    <style>
        /* Supaya padding dan border dihitung dalam width */
        * {
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background: #4A76FD;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 14px;
            font-weight: bold;
        }

        .login-box {
            background: #d3d3d3;
            padding: 30px;
            border-radius: 15px;
            width: 320px;
            color: black;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            text-align: center;
        }

        .login-box h3 {
            color: #4A76FD;
            margin-bottom: 20px;
            font-size: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 10px;
            border: none;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #4A76FD;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
        }

        .error-message {
            color: red;
            font-size: 13px;
            margin-bottom: 10px;
            text-align: left;
        }

        a.forgot-link {
            display: block;
            margin-top: 10px;
            font-size: 12px;
            color: #4A76FD;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>SELAMAT DATANG DI “ADMINKA”</h1>
        <p>APLIKASI KEPEGAWAIAN INSTANSI PEMERINTAHAN DAERAH KABUPATEN BAYUMAS</p>
    </div>

    <div class="login-box">
        <h3>LOGIN</h3>

        @if ($errors->has('login'))
            <div class="error-message">{{ $errors->first('login') }}</div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Enter</button>
        </form>

        <a href="#" class="forgot-link">Forgot the password?</a>
    </div>

</body>
</html>
