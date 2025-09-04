<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
</head>
<body>
    <h1>Add Contact</h1>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <p>Name: <input type="text" name="name" required></p>
        <p>Phone: <input type="text" name="phone" required></p>
        <button type="submit">Save</button>
    </form>

    <a href="{{ route('contacts.index') }}">⬅️ Back</a>
</body>
</html>
