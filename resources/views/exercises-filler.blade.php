<form action="{{ route('filler.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="files">Choose files:</label>
    <input type="file" name="files[]" id="files" multiple accept="video/mp4" />
    <select name="lesson_id" id="lesson_id">
        @foreach($lessons as $lesson)
            <option value={{$lesson->id}}>{{$lesson->lesson_name}}</option>
        @endforeach
    </select>
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
