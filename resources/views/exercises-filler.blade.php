<form action="{{ route('filler.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="files">Choose files:</label>
    <input type="file" name="files[]" id="files" multiple accept="video/mp4" />
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
    <p>{{ session('error') }}</p>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
