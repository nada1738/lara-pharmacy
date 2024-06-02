@if (Route::has('login'))
    <div class="fixed top-0 right-0 p-6 text-right z-10">
        @auth
            <a href="{{ url('/dashboard') }}"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
        @endauth
    </div>
@endif

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .left-panel {
            width: 50%;
            background: linear-gradient(180deg, #01be5f 0%, #87e7bf 68.75%);
            overflow: hidden;
            background-image: url('{{ asset("public/images/4136933.jpg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }

        .left-panel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .right-panel {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .right-panel h2 {
            font-size: 3rem;
            font-weight: bold;
            color: #2a4365;
        }

        .login-form {
            width: 80%;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f3f4f6;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #2bb036;
            color: #fff;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            outline: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-panel">
            <!-- Add your logo or background image here -->
            <img src="{{ asset('images/4136933.jpg') }}" alt="Background Image">
        </div>
        <div class="right-panel">
            <h2>Connectez-vous</h2>
            
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <!-- Email Address -->
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                <!-- Password -->
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
