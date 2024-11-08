@extends('voyager::master')

@section('content')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-archive"></i> Compras
        </h1>
        <span style="color:rgb(0, 0, 0); font-size: 14pt">Saldo:</span> <b
            style="color:rgb(3, 17, 139); font-size: 24pt; text-align:right !important">{{ number_format($balance, 2) }}</b>
        Bs.
    </div>

@stop

<div class="page-content browse container-fluid">
    @include('voyager::alerts')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-bordered">
                <div class="panel-body">

                    <h2>Historial de Compras</h2>
                    <div class="table-responsive" style="max-height:540px">
                        <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha de compra</th>
                                    <th>Imagen</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Valides hasta</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($productos as $producto)
                                    @foreach ($producto->cuentas as $cuenta)
                                        @foreach ($cuenta->perfiles as $perfil)
                                            @foreach ($perfil->suscripciones as $suscripcion)
                                                <tr>
                                                    <td>{{ Carbon\Carbon::parse($suscripcion->created_at)->locale('es')->diffForHumans() }}
                                                    </td> <!-- Nombre del producto -->
                                                    <td width="150px">
                                                        @if ($producto->images)
                                                            <img src="{{ asset('storage/' . $producto->images) }}"
                                                                alt="{{ $producto->nombre }}"
                                                                style="width: 150px; height: auto;">
                                                        @else
                                                            <img src="https://via.placeholder.com/400x200"
                                                                alt="Imagen de perfil"
                                                                style="width: 150px; height: auto;"
                                                                alt="Imagen no disponible">
                                                        @endif
                                                    </td> <!-- Nombre del producto -->
                                                    <td>{{ $producto->nombre }} <br>
                                                        <code>{{ $perfil->nombre_perfil }}</code>

                                                    </td> <!-- Nombre del producto -->
                                                    <td>{{ $producto->precio_suscripcion }}</td>
                                                    <!-- Email o algún identificador de la cuenta -->
                                                    {{-- <td>{{ $perfil->nombre_perfil }}</td> <!-- Nombre del perfil --> --}}
                                                    <td> {{ \Carbon\Carbon::parse($suscripcion->fecha_fin)->locale('es')->translatedFormat('j \\de F \\de Y') }} <br>
                                                         @if ($suscripcion->fecha_fin <  \Carbon\Carbon::now() )
                                                            <label class="label label-danger" style="border-radius: 15px;"> Vencío hace {{\Carbon\Carbon::now()->diffInDays($suscripcion->fecha_fin) }} dias </label>
                                                         @else
                                                         <label class="label label-success" style="border-radius: 15px;">  Vence en {{\Carbon\Carbon::now()->diffInDays($suscripcion->fecha_fin) }} dias </label>
                                                         @endif
                                                    </td>
                                                    <!-- Fecha de inicio de la suscripción -->
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic example">
                                                            <button type="button" class="btn btn-primary view-account"
                                                                data-id="{{ $cuenta->id }}" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="Clic para ver datos de acceso del perfil"> <i
                                                                    class="voyager-eye"></i>
                                                            </button> <button Class="btn btn-warning view-renovar"
                                                                data-producto="{{ $producto->nombre }}"
                                                                data-id="{{ $suscripcion->id }}"
                                                                data-precio="{{ $producto->precio_suscripcion }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Clic para ver opciones de renovacion del perfil">
                                                                <i class="voyager-forward"></i> </button>
                                                        </div>
                                                    </td>
                                                    <!-- acciones -->

                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-info text-center" role="alert">
                                                No hay datos que mostrar
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div id="accountDetails" style="display: none;">
                        <!-- Aquí se mostrarán los detalles de la cuenta -->
                        <h3>Detalles de la Cuenta</h3>
                        <p><strong>Usuario:</strong> <span id="modalUsuario">-</span></p>
                        <p><strong>Contraseña:</strong> <span id="modalPassword">-</span></p>
                    </div>
                    <div id="formularioRenovar" style="display: none;">
                        <h3>Renovar Suscripción</h3>
                        <form id="formRenovarSuscripcion">
                            <input type="hidden" name="suscripcion_id" id="suscripcion_id" />
                            <input type="hidden" name="precio" id="precio" />
                            <input type="hidden" name="rproducto" id="rproductos" />
                            <p><strong>Renovar:</strong> <span id="producto">-</span></p>

                            <div class="mb-3">
                                <label for="monto">Monto a descontar del saldo:</label>
                                <input type="number" class="form-control" name="monto" id="monto"
                                    readonly="readonly" required />
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Confirmar Renovación</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.view-account').on('click', function() {
            var cuentaId = $(this).data('id');

            // Generar la URL utilizando la ruta nombrada
            var url = '{{ route('wallet.obtener', ':id') }}'.replace(':id', cuentaId);

            // Hacer una petición AJAX para obtener los detalles de la cuenta
            $.ajax({
                url: url, // Usar la URL generada
                method: 'GET',
                success: function(data) {
                    // Mostrar el div con los detalles de la cuenta
                    document.getElementById('accountDetails').style.display = 'block';
                    $('#formularioRenovar').css('display', 'none');
                    $('#modalUsuario').text(data.usuario);
                    $('#modalPassword').text(data.contraseña);

                    // Ocultar el div después de 20 segundos
                    setTimeout(function() {
                        document.getElementById('accountDetails').style.display =
                            'none';
                    }, 25000); // 20,000 milisegundos = 20 segundos


                },
                error: function(xhr) {
                    alert('Error al obtener los datos de la cuenta: ' + xhr.responseText);
                }
            });
        });
    });


    $(document).ready(function() {
        $('.view-renovar').on('click', function() {
            var idSuscripcion = $(this).data('id');
            var precioSuscripcion = $(this).data('precio');
            var productoSuscripcion = $(this).data('producto');

            // Establecer los valores en el formulario
            $('#suscripcion_id').val(idSuscripcion);
            $('#precio').val(precioSuscripcion);
            $('#monto').val(precioSuscripcion); // Establece el monto por defecto
            $('#rproductos').val(productoSuscripcion); // Establece el monto por defecto
            $('#producto').text(productoSuscripcion);

            // Mostrar el formulario
            $('#formularioRenovar').css('display', 'block');
            document.getElementById('accountDetails').style.display = 'none';
        });
    });

    $('#formRenovarSuscripcion').on('submit', function(e) {
        e.preventDefault(); // Prevenir el envío del formulario por defecto

        var formData = $(this).serialize();

        $.ajax({
            url: '{{ route('wallet.renovar', ':id') }}'.replace(':id', $('#suscripcion_id').val()),
            method: 'POST',
            data: formData,
            success: function(response) {
                // Manejar la respuesta exitosa
                alert(response.success);
                // Ocultar el formulario
                $('#formularioRenovar').css('display', 'none');
                // Refrescar la página después de la renovación
                window.location.reload();
            },
            error: function(xhr) {
                // Manejar el error
                //alert(xhr.responseJSON.error);
                alert('Error al intentar renovar la suscripcion: ' + xhr.responseJSON.error);
            }
        });
    });
</script>
@endsection
