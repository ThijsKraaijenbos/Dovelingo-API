@vite('resources/css/app.css')
<body class="bg-gray-100 flex items-center flex-col justify-center min-h-screen">
<nav class="bg-blue-500 p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <ul class="flex space-x-4">
            <li><a href="{{ route('api-user.showRegisterForm') }}" class="text-white hover:underline">Register</a></li>
            <li><a href="{{ route('api-user.showCheckTokenForm') }}" class="text-white hover:underline">Check Your Token</a></li>
        </ul>
    </div>
</nav>
<div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-700 text-center">Check API Token</h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-2 mt-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if(session('token'))
        <div class="bg-green-100 text-green-700 p-2 mt-4 rounded break-all">
            <h1>Your API Token:</h1> <br>
            <code>{{ session('token') }}</code>
            @if(session('token_first'))
            <h1 class="text-red"><b>BELANGRIJK: Je krijgt deze token maar ÉÉN KEER Als je je token kwijt raakt, vraag Thijs voor een nieuwe</b></h1>
            @endif
        </div>
    @endif

    <form action="{{ route('api-user.checkToken') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" required>
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div class="flex flex-col justify-center items-center space-y-1">
            <button type="submit" value="true" name="checkToken" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                Login & Get API Token
            </button>
            <h1>OR</h1>
            <button type="submit" value="true" name="generateNewToken" class="w-full bg-blue-500 text-white text-center py-2 rounded-lg hover:bg-blue-600 transition">
                Generate New Token<br>
                <span class="text-xs">(Only use if you've lost your previous token)</span>
            </button>
        </div>
    </form>
</div>
</body>
