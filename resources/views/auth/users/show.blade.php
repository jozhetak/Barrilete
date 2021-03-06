@if (isset($Exito))
<p class="alert-success">{{ $Exito }}</p>
@endif
<h1>Detalle del usuario</h1>
<div id="action">
    @if (Auth::user()->is_admin)
    <a href="{{ route('users') }}" title="Volver la lista de usuarios del sitio" class="primary" id="ver">Volver al listado</a>
    <a href="{{ route('editUser', ['id' => $user->id]) }}" title="Editar perfil del usuario" class="success" id="editar">Editar</a>
    @if (!(Auth::user()->id == $user->id))
    <a href="{{ route('deleteUser', ['id' => $user->id]) }}" title="Borrar usuario del sistema" class="danger" id="borrar">Borrar</a>
    @endif
    @else
    <a href="{{ route('options') }}" class="primary" title="Ver opciones" id="ver">Opciones</a>
    <a href="{{ route('editUser', ['id' => $user->id]) }}" title="Editar mi perfil" class="success" id="editar">Editar</a>
    @endif       
</div>
<fieldset>
    @if ($user->photo)
    <img class="avatar" src="{{ asset('img/users/'.$user->photo) }}" />
    @else
    <img class="avatar" src="{{ asset('svg/avatar.svg') }}" />
    @endif
    <div class="user-info">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->email }} - @if ($user->is_admin) Administrador @else User @endif</p>
    </div>
</fieldset>
<fieldset>
    <h2>Más información</h2>
    <hr />
    <p><b>Edad</b>: <span class="info">{{ Carbon\Carbon::parse($user->birthday)->age.' años' }}</span></p>
    <p><b>Teléfono</b>: <span class="info">{{ $user->phone }}</span></p>
    <p><b>Dirección</b>: <span class="info">{{ $user->address }}</span></p>
    <p><b>Ciudad</b>: <span class="info">{{ $user->city }}</span></p>
    <p><b>Provincia</b>: <span class="info">{{ $user->state }}</span></p>
    <p><b>País</b>: <span class="info">{{ $user->country }}</span></p>
    <hr />
    <p><b>Acerca de mi</b>: <span class="info">{{ $user->description }}</span></p>
</fieldset>
<fieldset>
    <h2>Estadísticas</h2>
    <hr />
    <p><b>Artículos</b>: <span class="info">{{ $user->articles->count() }}</span></p>
    <p><b>Galerías</b>: <span class="info">{{ $user->gallery->count() }}</span></p>
    <p><b>Encuestas</b>: <span class="info">{{ $user->poll->count() }}</span></p>
</fieldset>
<script type="text/javascript" src="{{asset('js/dashboard-admin-users.js')}}"></script>