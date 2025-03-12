<form action="{{ route('emails.store') }}" method="POST">
    @csrf
    <textarea name="emails" placeholder="Plak hier de e-mailadressen"></textarea>
    <button type="submit">Opslaan</button>
</form>
