<!DOCTYPE html>
<html>

<head>

</head>

<body>

    @if (session('mensaje'))
        <div class="">
            {{ session('mensaje') }}<br><br>
        </div>
    @endif

    @error('title')
        <div class="alert alert-danger"> No olvides rellenar el nombre </div>
    @enderror

    @error('text')
        <div class="alert alert-danger"> No olvides rellenar el cuerpo de la nota</div>
    @enderror



    <form action="{{ route('notes.create') }}" method="POST">
        @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
        <input type="text" name="title" value="{{ old('title') }}" placeholder="Nombre de la nota" class="form-control mb-2" autofocus>
        <input type="text" name="text" value="{{ old('text') }}" placeholder="Descripción de la nota" class="form-control mb-2">
        <button class="btn btn-primary btn-block" type="submit">
            Crear nueva nota
        </button>
    </form>



</body>

</html>
