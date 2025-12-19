<form method="POST" action="/applications">
    @csrf
    <input type="hidden" name="scholarship_id" value="{{ request('scholarship_id') }}">

    <label>Student Email:</label>
    <input type="email" name="email">

    <button type="submit">Submit Application</button>
</form>
