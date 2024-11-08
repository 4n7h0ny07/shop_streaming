@extends('voyager::master')

@section('content')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-wallet"></i> Billetera
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
                <div class="panel-body" >

                    <h2>Historial de Transacciones</h2>
                    <div class="table-responsive" style="max-height:540px">
                        <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Detalles</th>
                                    <th>Tipo</th>
                                    <th>Monto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <td>{{ Carbon\Carbon::parse($transaction->created_at)->locale('es')->diffForHumans() }}
                                        </td>
                                        <td>{{ $transaction->description }}</td>
                                        <td>{{ $transaction->type }}</td>
                                        <td>{{ number_format($transaction->amount, 2) }}</td>

                                        <td><a href="{{ route('voucher.pdf', ['id' => $transaction->id]) }}"
                                                class="btn btn-danger" Target="_blank"><i
                                                    class="voyager-download"></i></a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
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
                    <h3>Recargar Billetera.?</h3>
                    <form id="qrForm">

                        <div class="form-inline div-option text-right" id="div-day">
                            <label for="amount">
                                <h4>Monto a Recargar:</h4>
                            </label>
                            <input class="form-control" type="number" id="amount" name="amount" placeholder="Monto"
                                value="{{ old('amount') }}">
                            <button class="btn btn-success" type="submit">Generar codigo Qr</button>
                        </div>
                    </form>
                    {{-- <form action="{{ route('wallet.debit') }}" method="POST">
                            @csrf
                            <input class="form-control" type="number" name="amount" placeholder="Monto">
                            <button class="btn btn-danger" type="submit">Retirar Fondos</button>
                        </form> --}}
                </div>
                {{-- <div id="data-container">
                    <img src="data:image/png;base64,{{ session('qrCode') }}" alt="Codigo QR no generador">
                </div> --}}
                <div id="qrCodeContainer"></div>
                <p id="qrStatus"></p>

            </div>
        </div>

    </div>
</div>



@section('javascript')
    {{-- <form action="{{ route('wallet.debit') }}" method="POST">
        @csrf
        <input type="number" name="amount" placeholder="Monto">
        <button type="submit">Retirar Fondos</button>
    </form> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let qrId = null; // Variable global para almacenar el ID del QR

        // Función que se activa al enviar el formulario y generar el QR
        $('#qrForm').on('submit', function(event) {
            event.preventDefault(); // Evitar el envío tradicional del formulario

            const amount = $('#amount').val(); // Obtener el monto ingresado por el usuario

            if (amount && amount > 0) {
                generateQr(amount); // Generar el QR
            } else {
                alert('Por favor, ingrese un monto válido.');
            }
        });

        // Función para generar el QR
        function generateQr(amount) {
            $.ajax({
                url: '{{ route('wallet.generateQr') }}', // Ruta para generar el QR
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Token CSRF para seguridad
                    amount: amount // Monto capturado del formulario
                },
                success: function(response) {
                    if (response.qrCode) {
                        // Mostrar el código QR generado
                        $('#qrCodeContainer').html(
                            `<img src="data:image/png;base64,${response.qrCode}" alt="QR Code">`);
                        qrId = response.qrId; // Guardar el ID del QR generado
                        startQrStatusCheck(); // Iniciar la consulta automática del estado
                    }
                },
                error: function(error) {
                    alert('Error al generar el código QR');
                }
            });
        }

        // Función para iniciar la consulta automática del estado del QR
        function startQrStatusCheck() {
            const interval = setInterval(function() {
                checkQrStatus(interval); // Llamar a la función para consultar el estado
            }, 5000); // Consultar cada 10 segundos
        }
        
// Función para consultar el estado del QR
async function checkQrStatus(interval) {
    if (!qrId) {
        clearInterval(interval); // Detener el intervalo si no hay un ID de QR
        return;
    }

    $.ajax({
        url: '{{ route("wallet.checkQrStatus") }}', // Ruta para consultar el estado del QR
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            qrId: qrId // Enviar el ID del QR generado
        },
        success: function(response) {
            const statusId = response.statusId; // Obtener el estado del QR

            // Mostrar el estado actual en la vista
            $('#qrStatus').text(`Esperando que se use el codigo Qr para agregar la recarga`);

            if (statusId === 2) { // Si el estado es "Usado"
                //alert('QR usado. .');
                clearInterval(interval); // Detener la consulta automática
                // Aquí puedes agregar el saldo a la billetera
                // Obtener la cantidad del input (o puedes usar una variable si ya tienes el monto guardado)
                const amount = $('#amount').val();

                if (!amount) {
                    alert('Error: el monto no está definido.');
                    return;
                }
                // Realizar la solicitud AJAX para agregar el saldo a la billetera
                $.ajax({
                    url: '{{ route("wallet.addCredit") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Asegúrate de incluir el token CSRF
                        amount: amount
                    },
                    success: function(response) {
                        //alert('Fondos añadidos correctamente.');
                        // Puedes hacer un refresh de la página o actualizar el saldo en la interfaz
                        location.reload(); // Recargar la página
                    },
                    error: function(xhr, status, error) {
                        //console.error('Error al agregar los fondos:', error);
                        //alert('Hubo un error al agregar los fondos.');
                        location.reload(); // Recargar la página
                    }
                });
                window.location.reload(); // Refrescar la página o redirigir
            } else if (statusId === 3) { // Si el estado es "Expirado"
                alert('El QR ha expirado.');
                clearInterval(interval); // Detener la consulta automática
                window.location.reload(); // Refrescar la página
            } else if (statusId === 4) { // Si el estado es "Error"
                alert('Hubo un error con el código QR.');
                clearInterval(interval); // Detener la consulta automática
            }
            // Si el estado es 1 (No Usado), sigue consultando
        },
        error: function(error) {
            alert('Error al consultar el estado del código QR');
            clearInterval(interval); // Detener la consulta en caso de error
        }
    });
}
    </script>
    {{-- <script src="{{ asset('js/jsqr.js') }}"></script> --}}
@endsection

@endsection
