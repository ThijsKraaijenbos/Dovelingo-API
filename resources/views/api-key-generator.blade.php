@vite('resources/css/app.css')
<div class="flex flex-col items-center bg-gray-100 p-10">
    <form method="POST" action="{{ route('tokens.generate') }}">
        @csrf
        <input type="submit" name="keygen" class="font-bold bg-emerald-200 p-3 rounded" value="Generate API Key">
    </form>
    <label>Generated Key:</label>
    <input type="text" readonly value={{$token ?? ""}}>
</div>
