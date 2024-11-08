
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
                        alert('Fondos añadidos correctamente.');
                        // Puedes hacer un refresh de la página o actualizar el saldo en la interfaz
                        location.reload(); // Recargar la página
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al agregar los fondos:', error);
                        alert('Hubo un error al agregar los fondos.');
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