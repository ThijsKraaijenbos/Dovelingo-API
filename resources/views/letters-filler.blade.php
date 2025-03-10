<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Gebaren</title>
</head>
<body>
<h1>Upload Gebaren en Letters</h1>

<form action="{{ route('letters.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="files">Kies afbeeldingen:</label>
    <input type="file" name="files[]" id="files" multiple accept="image/*" required />

{{--    <label for="letters">Bijbehorende letters (in volgorde van de afbeeldingen):</label>--}}
{{--    <input type="text" name="letters" id="letters" placeholder="Bijv: A,B,C" required />--}}

    <input type="submit" value="Upload">
</form>

@if(session('success'))
    <p>{{ session('success') }}</p>
    <ul>
        @foreach(session('paths') as $path)
            <li><a href="{{ Storage::url($path) }}" target="_blank">{{ basename($path) }}</a></li>
        @endforeach
    </ul>
@endif

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        <div style="color: red;">{{ $error }}</div>
    @endforeach
@endif
</body>
</html>
