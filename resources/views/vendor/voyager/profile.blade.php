@extends('voyager::master')


@section('css')
    <style>
        .user-email {
            font-size: .85rem;
            margin-bottom: 1.5em;
        }

        .form-container {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }
    </style>
@stop

@section('content')

    <div
        style="background-size:cover; background-image: url({{ Voyager::image(Voyager::setting('admin.bg_image'), voyager_asset('/images/bg.jpg')) }}); background-position: center center;position:absolute; top:0; left:0; width:100%; height:400px;">
    </div>
    <div style="height:50px; display:block; width:100%"></div>
    <div style="position:relative; z-index:999; text-align:center; ">
        <img src="@if (!filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)) {{ Voyager::image(Auth::user()->avatar) }}@else{{ Auth::user()->avatar }} @endif"
            class="avatar" style="border-radius:50%; width:150px; height:150px; border:5px solid #c45414;"
            alt="{{ Auth::user()->name }} avatar">
        <h4>{{ ucwords(Auth::user()->name) }}</h4>
        <div class="user-email text-dark">{{ ucwords(Auth::user()->email) }}</div>
        <p>{{ Auth::user()->bio }}</p>
        @if ($route != '')
            <a href="{{ $route }}" class="btn btn-success">{{ __('voyager::profile.edit') }}</a>
        @endif
    </div>
    <div class="container form-container">
        <h3>Datos Personales</h3>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Campo de user_id -->
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <!-- Campo de photo_front_page -->
            <div class="form-group">
                <label for="photo_front_page">Foto de portada</label>
                <input type="file" name="photo_front_page" id="photo_front_page" class="form-control">
                @if (isset($profile) && $profile->photo_front_page)
                    <p>Foto actual: <img src="{{ asset('storage/' . $profile->photo_front_page) }}" alt="Foto de portada"
                            style="max-width: 100px;"></p>
                @endif
            </div>

            <!-- Campo de phone_number -->
            <div class="form-group">
                <label for="phone_number">Número de teléfono</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control"
                    value="{{ old('phone_number', $profile->phone_number ?? '') }}" required>
            </div>

            <!-- Campo de number_document -->
            <div class="form-group">
                <label for="number_document">Número de documento</label>
                <input type="text" name="number_document" id="number_document" class="form-control"
                    value="{{ old('number_document', $profile->number_document ?? '') }}" required>
            </div>

            <!-- Campo de city -->
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" name="city" id="city" class="form-control"
                    value="{{ old('city', $profile->city ?? '') }}">
            </div>

            <!-- Campo de address -->
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" id="address" class="form-control"
                    value="{{ old('address', $profile->address ?? '') }}">
            </div>

            <!-- Campo de number_home -->
            <div class="form-group">
                <label for="number_home">Número de casa</label>
                <input type="text" name="number_home" id="number_home" class="form-control"
                    value="{{ old('number_home', $profile->number_home ?? '') }}">
            </div>

            <div id="map" style="height: 400px; margin-bottom: 20px;"></div>

            <!-- Campos ocultos para latitud y longitud -->
            <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $profile->latitude ?? '') }}">
            <input type="hidden" name="longitude" id="longitude"
                value="{{ old('longitude', $profile->longitude ?? '') }}">

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
        </form>
    </div>

    <!-- Agregar Leaflet.js y configurar el mapa -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([-17.7833, -63.1821], 13); // Coordenadas de ejemplo (Bolivia)

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker([-17.7833, -63.1821], {
                draggable: true
            }).addTo(map);

            function fetchAddress(lat, lng) {
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.address) {
                            document.getElementById('address').value = data.display_name || '';
                            document.getElementById('city').value = data.address.city || data.address.town ||
                                data.address.village || '';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching address:', error);
                    });
            }

            marker.on('dragend', function(e) {
                var lat = e.target.getLatLng().lat;
                var lng = e.target.getLatLng().lng;

                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;

                fetchAddress(lat, lng);
            });

            map.on('click', function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                marker.setLatLng([lat, lng]);
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;

                fetchAddress(lat, lng);
            });
        });
    </script>
@stop
