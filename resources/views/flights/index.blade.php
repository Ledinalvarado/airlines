
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vuelos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-light">


<nav class="navbar navbar-expand-lg navbar-dark" style="background:#0a2540">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Airlines</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#menuPrincipal" aria-controls="menuPrincipal"
                aria-expanded="false" aria-label="Mostrar menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="">Vuelos</a></li>
{{--                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('vuelos.index') }}">Vuelos</a></li>--}}
                <li class="nav-item"><a class="nav-link" href="#">Reservas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Pasajeros</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Aeropuertos</a></li>
            </ul>

            <div class="dropdown">
                <a class="btn btn-outline-light btn-sm dropdown-toggle" href="#" data-bs-toggle="dropdown">Administrador</a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<br>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            {{--    //////////////////--}}

            <!-- Botón que abre el modal -->
            <button type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#modalVuelo">
                 Nuevo vuelo /  {{$vuelos_count}}
            </button>

{{--            modal para registrar--}}
            <div class="modal fade" id="modalVuelo" tabindex="-1"
                 aria-labelledby="modalVueloLabel" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">

                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalVueloLabel">
                                Registrar nuevo vuelo
                            </h5>

                            <button type="button"
                                    class="btn-close btn-close-white"
                                    data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                        </div>

{{--                        formulario--}}
                        <form action="{{ route('flights.store') }}" method="POST">

                            @csrf

                            <div class="modal-body">

{{--                                origen--}}
                                <div class="mb-3">

                                    <label for="origen" class="form-label">
                                        Ciudad de origen
                                    </label>

                                    <input type="text"
                                           class="form-control @error('origen') is-invalid @enderror"
                                           id="origen"
                                           name="origen"
                                           value="{{ old('origen') }}"
                                           placeholder="Ej. Tegucigalpa"
                                           >

                                    @error('origen')
{{--                                    <div class="invalid-feedback">--}}
                                       <p> {{ $message }}</p>
{{--                                    </div>--}}
                                    @enderror
                                </div>

{{--                                destino--}}
                                <div class="mb-3">
                                    <label for="destino" class="form-label">
                                        Ciudad de destino
                                    </label>

                                    <input type="text"
                                           class="form-control @error('destino') is-invalid @enderror"
                                           id="destino"
                                           name="destino"
                                           value="{{ old('destino') }}"
                                           placeholder="Ej. San Pedro Sula"
                                           required>

                                    @error('destino')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

{{--                               codigo--}}
                                <div class="mb-3">
                                    <label for="codigo" class="form-label">
                                        Código del vuelo
                                    </label>

                                    <input type="text"
                                           class="form-control @error('codigo') is-invalid @enderror"
                                           id="codigo"
                                           name="codigo"
                                           value="{{ old('codigo') }}"
                                           placeholder="Ej. HN101"
                                           required>

                                    @error('codigo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="modal-footer">

                                <button type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal">
                                    Cancelar
                                </button>

                                <button type="submit" class="btn btn-primary">
                                    Guardar vuelo
                                </button>

                            </div>

                        </form>

                    </div>
                </div>
            </div>


            {{--    ////////////////--}}
        </div>
    </div>
<br>


    <div class="card">
        <div class="card-body">

            @if($errors->any())
                    <div class="alert  alert-danger alert-dismissible fade show">
                        <strong> Se encontraron los siguientes errores: </strong>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                              <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert">

                        </button>
                    </div>
            @endif





















            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>Se encontraron errores al registrar un nuevo vuelo:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"></button>
                </div>
            @endif






{{--            mensaje cuando se registren bien--}}
            @if(session('success'))




{{--                //////--}}
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"></button>
                </div>
            @endif



            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>

                @forelse ($vuelos as $vuelo)


                    <tr>
                        <th scope="row">{{$vuelo->id}}</th>
                        <td> {{$vuelo->origen}}</td>
                        <td> {{$vuelo->destino}}</td>
                        <td> {{$vuelo->codigo}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic outlined example">
{{--                                <button type="button" class="btn btn-success">Editar</button>--}}

                                <!-- Botón que abre el modal -->
                                <button type="button"
                                        class="btn btn-outline-info"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalVueloUpdate{{$vuelo->id}}">
                                    Actualizar
                                </button>

                                {{--            modal para registrar--}}
                                <div class="modal fade" id="modalVueloUpdate{{$vuelo->id}}" tabindex="-1"
                                     aria-labelledby="modalVueloLabel" aria-hidden="true">

                                    <div class="modal-dialog modal-dialog-centered">

                                        <div class="modal-content">

                                            <div class="modal-header bg-primary text-white">
                                                <h5 class="modal-title" id="modalVueloLabel">
                                                  Actualizar Vuelo
                                                </h5>

                                                <button type="button"
                                                        class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Cerrar"></button>
                                            </div>

                                            {{--                        formulario--}}
                                            <form action="{{ route('flights.update',$vuelo->id) }}" method="POST">

                                                @csrf
                                                @method('PUT')

                                                <div class="modal-body">

                                                    {{--                                origen--}}
                                                    <div class="mb-3">

                                                        <label for="origen" class="form-label">
                                                            Ciudad de origen
                                                        </label>

                                                        <input type="text"
                                                               class="form-control @error('origen') is-invalid @enderror"
                                                               id="origen"
                                                               name="origen"
                                                               value="{{ old('origen', $vuelo->origen) }}"
                                                               placeholder="Ej. Tegucigalpa"
                                                        >

                                                        @error('origen')
                                                        {{--                                    <div class="invalid-feedback">--}}
                                                        <p> {{ $message }}</p>
                                                        {{--                                    </div>--}}
                                                        @enderror
                                                    </div>

                                                    {{--                                destino--}}
                                                    <div class="mb-3">
                                                        <label for="destino" class="form-label">
                                                            Ciudad de destino
                                                        </label>

                                                        <input type="text"
                                                               class="form-control @error('destino') is-invalid @enderror"
                                                               id="destino"
                                                               name="destino"
                                                               value="{{ old('destino', $vuelo->destino) }}"
                                                               placeholder="Ej. San Pedro Sula"
                                                               required>

                                                        @error('destino')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    {{--                               codigo--}}
                                                    <div class="mb-3">
                                                        <label for="codigo" class="form-label">
                                                            Código del vuelo
                                                        </label>

                                                        <input type="text"
                                                               class="form-control @error('codigo') is-invalid @enderror"
                                                               id="codigo"
                                                               name="codigo"
                                                               value="{{ old('codigo',$vuelo->codigo) }}"
                                                               placeholder="Ej. HN101"
                                                               required>

                                                        @error('codigo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button"
                                                            class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                        Cancelar
                                                    </button>

                                                    <button type="submit" class="btn btn-primary">
                                                        Guardar vuelo
                                                    </button>

                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>



                                {{--                                ////////////////////////--}}


{{--                                <button type="button" class="btn btn-outline-danger" >Eliminar</button>--}}

                                <form action="{{ route('flights.destroy', $vuelo->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">
                                        Eliminar
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <p>No hay registros de vuelos</p>
                @endforelse


                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>



{{--{{$vuelos}}--}}
{{--@forelse ($vuelos as $vuelo)--}}
{{--    {{$vuelo->origen}}--}}
{{--    <p> {{$vuelo->destino}}</p>--}}

{{--@empty--}}
{{--    <p>No hay registros de vuelos</p>--}}
{{--@endforelse--}}













{{--<table border="1">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>ID</th>--}}
{{--        <th>Origen</th>--}}
{{--        <th>Destino</th>--}}
{{--        <th>Código</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}

{{--    <tbody>--}}
{{--    @forelse ($vuelos as $flight)--}}
{{--        <div class="columns-2">--}}
{{--            <p>Well, let me tell you something, ...</p>--}}
{{--            <p class="break-before-column">Sure, go ahead, laugh...</p>--}}
{{--            <p>Maybe we can live without...</p>--}}
{{--            <p>Look. If you think this is...{{ $flight->origen }}</p>--}}
{{--        </div>--}}
{{--        <tr>--}}
{{--            <td>{{ $flight->id }}</td>--}}
{{--            <td>{{ $flight->origen }}</td>--}}
{{--            <td>{{ $flight->destino }}</td>--}}
{{--            <td>{{ $flight->codigo }}</td>--}}
{{--        </tr>--}}
{{--    @empty--}}
{{--        <tr>--}}
{{--            <td colspan="4">No hay vuelos registrados.</td>--}}
{{--        </tr>--}}
{{--    @endforelse--}}
{{--    </tbody>--}}
{{--</table>--}}
