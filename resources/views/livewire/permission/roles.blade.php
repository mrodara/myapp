<div>
    <x-input label="Rol de Usuario" placeholder="Role name" corner-hint="Ej: Admin" />
    <ul>

        @forelse ($roles as $role)
            <li>{{ $role->name }} ({{ $role->permissions->count() }})</li>
        @empty
        <h2>No hay datos para mostrar</h2>
        @endforelse
    </ul>
</div>
