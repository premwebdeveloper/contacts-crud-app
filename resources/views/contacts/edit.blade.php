<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf @method('PUT')
        <p>Name: <input type="text" name="name" value="{{ $contact->name }}" required></p>
        <p>Phone: <input type="text" name="phone" value="{{ $contact->phone }}" required></p>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('contacts.index') }}">⬅️ Back</a>
</body>
</html>
