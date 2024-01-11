<!DOCTYPE html>
<html>

<head>

</head>

<body>
    <h1>Notas desde base de datos</h1>
    <a href="new_note">Nueva nota</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach ($notes as $note)
            <tr>
                <td>{{ $note->title }}</td>
                <td>{{ $note->text }}</td>
                <td><a href="notes/{{ $note->id }}">Ver detalles</a></td>
                <td><a href="{{ route('notes.edit', $note) }}" class="btn btn-warning btn-sm"> Editar </a>
                </td>
                <td>
                    <form action="{{ route('notes.delete', $note->id) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <p>{{ $notes->links() }}</p>
</body>

</html>
