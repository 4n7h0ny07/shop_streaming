<nav class="navbar navbar-default navbar-fixed-top navbar-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="hamburger btn-link">
                <span class="hamburger-inner"></span>
            </button>
            @section('breadcrumbs')
                <ol class="breadcrumb hidden-xs">
                    @php
                        $segments = array_filter(
                            explode('/', str_replace(route('voyager.dashboard'), '', Request::url())),
                        );
                        $url = route('voyager.dashboard');
                    @endphp
                    @if (count($segments) == 0)
                        <li class="active"><i class="voyager-boat"></i> {{ __('voyager::generic.dashboard') }}</li>
                    @else
                        <li class="active">
                            <a href="{{ route('voyager.dashboard') }}"><i class="voyager-boat"></i>
                                {{ __('voyager::generic.dashboard') }}</a>
                        </li>
                        @foreach ($segments as $segment)
                            @php
                                $url .= '/' . $segment;
                            @endphp
                            @if ($loop->last)
                                <li>{{ ucfirst(urldecode($segment)) }}</li>
                            @else
                                <li>
                                    <a href="{{ $url }}">{{ ucfirst(urldecode($segment)) }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ol>
            @show
        </div>
        <ul class="nav navbar-nav @if (__('voyager::generic.is_rtl') == 'true') navbar-left @else navbar-right @endif">
            @php
                $user = auth()->user();
                $transactions = $user->transactions()->latest()->get();
                $balance = $user->getWalletBalance();
            @endphp
            <li class="dropdown">
                @if($balance > 0)
                <a href="{{ route('wallet.show') }}"><span style="font-size: 24px" class="voyager-wallet text-warning">
                        <b><label class="label text-warning" style="margin-left: -10px; cursor: pointer">S.:
                                {{ number_format($balance, 2) }} Bs.</label></b>
                    </span>
                </a>
                @else
                <a href="{{ route('wallet.show') }}"><span style="font-size: 24px" class="voyager-wallet text-primary">
                    <b><label class="label text-primary" style="margin-left: -10px; cursor: pointer">S.:
                            {{ number_format($balance, 2) }} Bs.</label></b>
                </span>
            </a>
                @endif
            </li>
            @auth
                @if (auth()->user()->role_id === 1)
                    @php
                        // Obtener todos los productos con suscripciones vencidas
                        $productos = \App\Models\Product::with([
                            'cuentas.perfiles.suscripciones' => function ($query) {
                                $query->where('fecha_fin', '<', \Carbon\Carbon::now()); // Filtra suscripciones vencidas
                            },
                            'cuentas.perfiles.suscripciones.user', // Cargar la relación del usuario
                        ])->get();
                        // Consulta para obtener suscripciones vencidas
                        $vencidas = \App\Models\Suscripcion::where('fecha_fin', '<', \Carbon\Carbon::now())->get();
                    @endphp

                    <li class="dropdown">
                        @if ($vencidas->count() > 0)
                            <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                                aria-expanded="false"><span style="font-size: 24px"
                                    class="voyager-bell text-danger"><b><label class="label label-danger"
                                            style="margin-left: -10px; border-radius: 20px; cursor: pointer">{{ $vencidas->count() }}</label></b>
                                </span>

                            </a>
                            <ul class="dropdown-menu dropdown-menu-animated">
                                @foreach ($productos as $producto)
                                    @foreach ($producto->cuentas as $cuenta)
                                        @foreach ($cuenta->perfiles as $perfil)
                                            @foreach ($perfil->suscripciones as $suscripcion)
                                                <li class="profile-img">
                                                    <div class="profile-body">
                                                        <h5>{{ $producto->nombre }}</h5>
                                                        <h5>{{ $suscripcion->user->name }}</h5>
                                                        <h6>{{ \Carbon\Carbon::now()->diffInDays($suscripcion->fecha_fin) }}
                                                            días vencidos
                                                        </h6>
                                                    </div>
                                                </li>
                                                <li class="divider"></li>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </ul>
                        @else
                            <a href="#"><span style="font-size: 24px" class="voyager-bell text-success"> </span>
                            </a>
                        @endif
                    </li>
                @else
                    @php
                        // Obtener todas las suscripciones vencidas
                        $user = auth()->user();
                        $productoCaducado = \App\Models\Product::whereHas('cuentas', function ($query) use ($user) {
                            $query->whereHas('perfiles', function ($query) use ($user) {
                                $query->whereHas('suscripciones', function ($query) use ($user) {
                                    $query->where('user_id', $user->id);
                                });
                            });
                        })
                            ->with([
                                'cuentas.perfiles.suscripciones' => function ($query) use ($user) {
                                    $query->where('user_id', $user->id);
                                },
                            ])
                            ->get();

                        $caducadas = \App\Models\Suscripcion::where('fecha_fin', '<', \Carbon\Carbon::now())
                            ->where('user_id', auth()->id())
                            ->get();
                    @endphp

                    <li class="dropdown">
                        @if ($caducadas->count() > 0)
                            <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                                aria-expanded="false"><span style="font-size: 24px"
                                    class="voyager-bell text-danger"><b><label class="label label-danger"
                                            style="margin-left: -10px; border-radius: 20px; cursor: pointer">{{ $caducadas->count() }}</label></b>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-animated">
                                @foreach ($productoCaducado as $producto)
                                    @foreach ($producto->cuentas as $cuenta)
                                        @foreach ($cuenta->perfiles as $perfil)
                                            @foreach ($perfil->suscripciones as $suscripcion)
                                                <li class="profile-img">
                                                    <a href="{{ route('wallet.index') }}">
                                                        <div class="profile-body">
                                                            <h5>{{ $producto->nombre }}</h5>
                                                            <h5>{{ $cuenta->usuario }}</h5>
                                                            <h6 class="text-danger">{{ \Carbon\Carbon::now()->diffInDays($suscripcion->fecha_fin) }}
                                                                días vencidos
                                                            </h6>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="divider"></li>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </ul>
                        @else
                            <a href="#"><span style="font-size: 24px" class="voyager-bell text-success"> </span>
                            </a>
                        @endif
                    </li>
                @endif
            @endauth
            <li class="dropdown profile">
                <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button"
                    aria-expanded="false"><img src="{{ $user_avatar }}" class="profile-img"> <span
                        class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-animated">
                    <li class="profile-img">
                        <img src="{{ $user_avatar }}" class="profile-img" width="50px">
                        <div class="profile-body">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h6>{{ Auth::user()->email }}</h6>
                        </div>
                    </li>

                    <li class="divider"></li>
                    <?php $nav_items = config('voyager.dashboard.navbar_items'); ?>
                    @if (is_array($nav_items) && !empty($nav_items))
                        @foreach ($nav_items as $name => $item)
                            <li {!! isset($item['classes']) && !empty($item['classes']) ? 'class="' . $item['classes'] . '"' : '' !!}>
                                @if (isset($item['route']) && $item['route'] == 'voyager.logout')
                                    <form action="{{ route('voyager.logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-block">
                                            @if (isset($item['icon_class']) && !empty($item['icon_class']))
                                                <i class="{!! $item['icon_class'] !!}"></i>
                                            @endif
                                            {{ __($name) }}
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ isset($item['route']) && Route::has($item['route']) ? route($item['route']) : (isset($item['route']) ? $item['route'] : '#') }}"
                                        {!! isset($item['target_blank']) && $item['target_blank'] ? 'target="_blank"' : '' !!}>
                                        @if (isset($item['icon_class']) && !empty($item['icon_class']))
                                            <i class="{!! $item['icon_class'] !!}"></i>
                                        @endif
                                        {{ __($name) }}
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
        </ul>
    </div>
</nav>
