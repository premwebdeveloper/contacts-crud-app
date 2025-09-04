<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
</head>
<body>
    <h1>Contacts</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('contacts.create') }}">➕ Add Contact</a>

    <form action="{{ route('contacts.importXML') }}" method="POST" enctype="multipart/form-data" style="margin-top:10px;">
        @csrf
        <input type="file" name="xml_file" required>
        <button type="submit">📂 Import XML</button>
    </form>

    <table border="1" cellpadding="5" cellspacing="0" style="margin-top:20px;">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        @foreach($contacts as $c)
        <tr>
            <td>{{ $c->name }}</td>
            <td>{{ $c->phone }}</td>
            <td>
                <a href="{{ route('contacts.edit',$c->id) }}">✏️ Edit</a>
                <form action="{{ route('contacts.destroy',$c->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this contact?')">🗑️ Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
