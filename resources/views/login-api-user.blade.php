@vite('resources/css/app.css')
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-700 text-center">API User Login</h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-2 mt-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if(session('token'))
        <div class="bg-green-100 text-green-700 p-2 mt-4 rounded break-all">
            <h1>Your API Token:</h1> <br>
            <code>{{ session('token') }}</code>
        </div>
    @endif

    <form action="{{ route('api-user.login') }}" method="POST" class="mt-4">
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

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
            Login & Get API Token
        </button>
    </form>
</div>
</body>
