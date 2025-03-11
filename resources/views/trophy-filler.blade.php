<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload trophies</title>
</head>
<body>
<h1>Upload van trophies en scores</h1>

<form action="{{ route('trophies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="files">Kies afbeeldingen:</label>
    <input type="file" name="files[]" id="files" multiple accept="image/*" required />

    <label for="required_score">Vereiste score:</label>
    <input type="number" name="required_score" id="required_score" min="0" placeholder="Vereiste score" />
    <br><br>

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
