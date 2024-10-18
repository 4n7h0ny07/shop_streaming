<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ 'Voucher - ' . str_pad($transaction->id, 6, '0', STR_PAD_LEFT) }}</title>

    <style>
        .container {
            display: grid;
            /* Usar grid */
            grid-template-columns: 1fr 1fr;
            /* Dos columnas de igual ancho */
            gap: 20px;
            /* Espacio entre los elementos */
        }

        .box {
            float: left;
            /* Flotar los divs a la izquierda */
            /*width: 48%;
             * Ajusta el ancho de cada div */
            /*border: 1px solid black;*
            padding: 5px;*/
            box-sizing: border-box;
            /* Incluye padding y borde en el tamaño total */
            margin-right: 35%;
            /* Espacio entre los divs */
            font-size: 10pt;
            /*tamaño de la fuents */
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            /* Combina bordes de celdas adyacentes */
            margin-top: 20px;
            /* Espacio entre el título y la tabla */
        }

        th {
            background-color: #1071B8;
            /* Color de fondo del encabezado */
            color: white;
            /* Color del texto del encabezado */
            padding: 10px;
            text-align: center;
            /* Alinear texto a la izquierda */
        }

        .td {
            border: 1px solid #1071B8;
            /* Bordes de celdas */
            padding: 8px;
            /* Espaciado interno */
            text-align: left;
            /* Alinear texto a la izquierda */
        }

        .fixed-width {
            width: 50px;
            /* Ancho específico */
            white-space: nowrap;
            /* No permite que el texto se divida en varias líneas */
        }

        .large-width {
            width: 150px;
            /* Ancho específico más grande */
            white-space: nowrap;
            /* No permite que el texto se divida en varias líneas */
        }

        .multiple-lines {
            text-align: left;
            font-size: 10pt;
            width: 50%;
            /*max-width: 100%;
            border: 2px solid #4CAF50;/*/
            float: left;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
            /* Cambia el número de líneas aquí */
        }

        .watermark {
            position: absolute;
            top: 50%;
            /* Centrar verticalmente */
            left: 50%;
            /* Centrar horizontalmente */
            width: 100%;
            /* Ancho completo */
            height: 100%;
            /* Alto completo */
            z-index: -1;
            /* Detrás del contenido */
            opacity: 0.1;
            /* Ajusta la opacidad */
            background-image: url('{{ public_path('storage/' . $logoUrl) }}');
            /* Ruta de la imagen */
            background-size: contain;
            /* Mantiene la proporción de la imagen */
            background-position: center;
            /* Centrar la imagen */
            background-repeat: no-repeat;
            /* No repetir la imagen */
            transform: translate(-50%, -50%);
            /* Centrar en ambos ejes */
        }

        /* Estilo para el footer */
        .footer {
            position: absolute;
            /* Posiciona el footer al final de la página */
            bottom: 0;
            /* Pegado al fondo */
            left: 0;
            width: 100%;
            /* Ancho completo */
            text-align: center;
            /* Centrar el texto */
            font-size: 10pt;
            /* Tamaño de fuente */
            /*border-top: 3px solid #1071B8;
            /* Línea superior */
            border-bottom: 5px solid #1071B8;
            padding: 10px 0;
            /* Espaciado interno */
            background-color: #1072b800;
            /* Fondo opcional para el footer */
        }
    </style>
</head>

<body>
    <div class="watermark"></div>
    <table>
        <tbody>
            <tr>
                <td width="100mm" style="text-align: center; font-size:10pt">
                    <img src="{{ public_path('storage/' . $logoUrl) }}" alt="No Image" style="width:150px"><br>

                    <span>
                        {{-- <b>Tel.: </b> {{$phoneUrl}} --}}
                        {{ $phoneUrl }}
                    </span><br>
                    <span>
                        {{-- <b>Direccion: </b> {{ $addressUrl }} --}}
                        {{ $addressUrl }}
                    </span><br>
                    <span>
                        Trinidad - Beni - Bolivia
                    </span>
                </td>
                <td width="100mm">
                    <div style="width:100%; color:#1071B8">
                        <span style="font-size: 20pt; text-align:center; width:100%"><b> Voucher</b></span><br>
                        <span> <b>Transaccion N°:</b> {{ str_pad($transaction->id, 6, '0', STR_PAD_LEFT) }} </span><br>
                        <span> <b>Fecha :</b>
                            {{ \Carbon\Carbon::parse($transaction->created_at)->locale('es')->isoFormat('D [de] MMMM [de] YYYY, h:mm A') }}
                        </span><br>
                        <span>Saldo Actual: <b>{{ number_format($balance, 2) }}</b></span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <div style="font-size:12pt; text-align:center !important; width:100% ">
        @if ($transaction->type === 'credit')
            <b style="color:  #1071B8;">{{ 'COMPROBANTE DE RECARGA DE CREDITO EXPRESADO EN BOLIVIANOS' }}</b>
            {{-- {{$transaction->type}} --}}
        @else
            <b style="color:  #a30000;">{{ 'COMPROBANTE DE DEBITO DE SU SALDO EN BOLIVIANOS' }}</b>
        @endif

        {{-- <span>COMPROBANTE DE RECARGA DE CREDITO EXPRESADO EN BOLIVIANOS</span> --}}
    </div>
    <hr>
    <br><br><br>

    <div class="container">
        <div class="box">
            <span><b>Razon social o Nombre:</b>  {{ $transaction->user->name }}</span>
        </div>
        <div class="box">
            <span><b>NIT/CI/CEX:</b> </span>
        </div>
    </div>

    <table class="table">
        <thead>
            <th>Transaccion</th>
            <th>Glosa</th>
            <th>Monto</th>
        </thead>
        <tbody>
            <tr>
                <td class="td " style="text-align:center; height: 30mm;">
                    @if ($transaction->type === 'credit')
                        <b style="color:  #4CAF50;">{{ 'Deposito' }}</b>
                        {{-- {{$transaction->type}} --}}
                    @else
                        <b style="color:  #a30000;">{{ 'Debito' }}</b>
                    @endif
                </td>
                <td class="td"> {{ $transaction->description }} </td>
                <td class="td" style="text-align:right;"> {{ number_format($transaction->amount, 2) }} </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="container">
                        <div style="text-align:left; font-size:10pt; width:20%; float: right !important;"> Sub Total Bs.
                        </div>
                    </div>
                </td>
                <td class="td" style="text-align:right;  background-color: #1071B8; color:rgb(255, 255, 255);">
                    {{ number_format($transaction->amount, 2) }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="container">
                        <div class="multiple-lines"> Son: {{ $amount_in_words }}</div>
                        <div style="text-align:left; font-size:10pt; width:20%; float: right !important;"> Bono Bs.
                        </div>
                    </div>
                </td>
                <td class="td" style="text-align:right;  background-color: #1071B8; color:rgb(255, 255, 255);">
                    {{ number_format(0, 2) }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="container">
                        <div style="text-align:left; font-size:10pt; width:20%; float: right !important;"> Total Bs.
                        </div>
                    </div>
                </td>
                <td class="td" style="text-align:right; background-color: #1071B8; color:rgb(255, 255, 255);">
                    {{ number_format($transaction->amount, 2) }}</td>
            </tr>
        </tbody>
    </table>
    <div class="footer">
        <table width="100%">
            <tbody>
                <tr>
                    <td style=" color: #1071B8; text-align:justify; font-size:8pt; width:33.33%">
                        <span> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24">
                                <path d="M10 20.45l-8-8.1L3.3 10.5 10 17.25 20.7 6.5l1.3 1.3z"/>
                            </svg>
                            <i class="fa-brands fa-whatsapp"></i> 591 - {{ $phoneUrl }}                      
                        </span>
                    </td>
                    <td style=" color: #1071B8; text-align:justify; font-size:8pt; width:33.33%">
                        <i class="fa-brands fa-facebook"></i> <i class="fa-brands fa-tiktok"></i> <i class="fa-brands fa-x-twitter"></i>
                    </td>
                    <td style=" color: #1071B8; text-align:center; font-size:6pt; width:33.33%">
                        <span> Generado por : {{ auth()->user()->name }}</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
