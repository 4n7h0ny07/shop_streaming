@extends('voyager::master')

@section('page_header')
    <div class="container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-8">
                <h3>
                    <i class="voyager-logbook"></i> Lista de Codigos Qr Generados
                </h3>
            </div>
            <div class="col-md-4">
                <form action="{{ route('qrlist') }}" method="POST">
                    @csrf


                    <div class="form-inline div-option text-right" id="div-day">
                        <label for="date">Fecha:</label>
                        <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" required>
                        <button type="submit" class="btn btn-primary">Generar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{-- <span style="color:rgb(0, 0, 0); font-size: 14pt">Saldo:</span> <b
            style="color:rgb(3, 17, 139); font-size: 24pt; text-align:right !important">{{ number_format($balance, 2) }}</b>
        Bs. --}}

@stop
@section('content')


    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <h2>Lista de Códigos QR Generados</h2>

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (isset($qrDetails) && $success)
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Monto</th>
                                                <th>Moneda</th>
                                                <th>Fecha de Generación</th>
                                                <th>Fecha de Expiración</th>
                                                <th>ID de Estado</th>
                                                <th>Fecha de Transacción</th>
                                                <th>Banco de Origen</th>
                                                <th>Glosa</th>
                                                {{-- <th>Número de Cuenta Destino</th> --}}
                                                <th>Notificación Exitosa</th>
                                                <th>ID de Comprobante</th>
                                                <th>ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($qrDetails as $qr)
                                                <tr>
                                                    <td>{{ $qr['id'] }}</td>
                                                    <td>{{ $qr['amount'] }}</td>
                                                    <td>{{ $qr['currency'] }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($qr['generationDate'])->format('Y-m-d H:i:s') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($qr['expirationDate'])->format('Y-m-d H:i:s') }}
                                                    </td>
                                                    <td>
                                                        @switch($qr['statusId'])
                                                            @case(1)
                                                                No Usado
                                                            @break

                                                            @case(2)
                                                                Usado
                                                            @break

                                                            @case(4)
                                                                Con Error
                                                            @break

                                                            @default
                                                                Desconocido
                                                        @endswitch
                                                    </td>
                                                    <td>{{ $qr['transactionDate'] === '0001-01-01T00:00:00' ? 'No disponible' : \Carbon\Carbon::parse($qr['transactionDate'])->format('Y-m-d H:i:s') }}
                                                    </td>
                                                    <td>{{ $qr['sourceBank'] ?? 'No especificado' }}</td>
                                                    <td>{{ $qr['gloss'] }}</td>
                                                    {{-- <td>{{ $qr['destinationAccountNumber'] ?? 'No especificado'  }}</td> --}}
                                                    <td>{{ $qr['notificationSuccess'] ? 'Sí' : 'No' }}</td>
                                                    <td>{{ $qr['voucherId'] ?? 'No disponible' }}</td>
                                                    <td>
                                                        @if ($qr['statusId'] === 2)
                                                        @else
                                                            <form action="{{ route('cancelQr') }}" method="post">
                                                                @csrf
                                                                <div class="form-inline div-option text-right">

                                                                    <input type="hidden" class="form-control"
                                                                        name="qrId" value="{{ $qr['id'] }}"
                                                                        required>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Cancelar Qr</button>
                                                                </div>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else
                            <p>No hay códigos QR para mostrar.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
