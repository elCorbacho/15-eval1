<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <h1>Welcome</h1>

    <div class="mb-3">
        <a href="{{ url('/proyectos') }}" class="btn btn-info">Obtener Proyectos</a>
        <a href="{{ url('/proyectos/crear') }}" class="btn btn-success">Crear Proyecto</a>
        <a href="{{ url('/proyectos/eliminar') }}" class="btn btn-danger">Eliminar Proyecto</a>
        <a href="{{ url('/proyecto/buscar') }}" class="btn btn-warning">Buscar Proyecto</a>
        <a href="{{ url('/proyectos/editar') }}" class="btn btn-secondary">Editar Proyecto</a>
    </div>

    <div>@yield('content')</div>

    <h2>AC DEVops</h2>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>