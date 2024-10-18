document.addEventListener('DOMContentLoaded', () => {
    const socket = io('http://localhost:3000'); // Cambia la URL según tu configuración

    const qrId = '{{ $qrId }}'; // Asegúrate de tener el $qrId disponible en la vista

    // Envía el evento para verificar el estado del QR
    const checkStatus = () => {
        socket.emit('checkStatus', qrId);
    };

    // Llama a la función de chequeo cada 5 segundos
    const intervalId = setInterval(checkStatus, 5000);

    // Escucha el evento 'qrStatus' para recibir el estado del QR
    socket.on('qrStatus', (status) => {
        console.log('Estado del QR:', status);

        if (status.success) {
            switch (status.statusId) {
                case 1: // No usado
                    // Sigue consultando
                    console.log("El QR no ha sido usado, sigue consultando...");
                    break;

                case 2: // Usado
                    clearInterval(intervalId); // Detiene la consulta
                    // Agregar el saldo a la billetera
                    agregarSaldo(status.amount); // Implementa esta función
                    console.log("El QR ha sido usado, saldo agregado a la billetera.");
                    break;

                case 3: // Expirado
                    clearInterval(intervalId); // Detiene la consulta
                    // Refresh de la página
                    location.reload();
                    console.log("El QR ha expirado, recargando la página.");
                    break;

                case 4: // Con error
                    clearInterval(intervalId); // Detiene la consulta
                    alert("Error: " + status.message); // Muestra el mensaje de error
                    console.log("Error con el QR: ", status.message);
                    break;

                default:
                    console.log("Estado desconocido: ", status.statusId);
                    break;
            }
        } else {
            alert("Error al consultar el QR");
        }
    });
});
