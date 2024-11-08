@extends('voyager::master')

@section('content')
<div class="page-content">
    <div class="container">
        <h1>Enviar SMS</h1>
        <form action="{{ route('voyager.send-sms') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="phone_number">Número de Teléfono</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Ej: 76543210" required>
            </div>
            <div class="form-group">
                <label for="message">Mensaje</label>
                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Escribe tu mensaje aquí" required></textarea>
                <small id="charCount" class="form-text text-muted">0/159 caracteres</small>
            </div>
            <button type="submit" class="btn btn-primary">Enviar SMS</button>
        </form>
    </div>
</div>

<script>
    // Script para mostrar el conteo de caracteres
    document.getElementById('message').addEventListener('input', function () {
        var maxLength = 159;
        var currentLength = this.value.length;
        document.getElementById('charCount').textContent = currentLength + '/' + maxLength + ' caracteres';
    });
</script>
@endsection