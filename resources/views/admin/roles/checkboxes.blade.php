@foreach($roles as $role)
    <div class="checkbox">
        <label for="roles-{{$role->id}}">
            <input name="roles[]" id="roles-{{$role->id}}" type="checkbox" value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'checked' : ''}}>
            {{ $role->name }} <br>
            <small class="text-muted">{{ $role->permissions()->pluck('name')->implode(', ') }}</small>
        </label>
    </div>
@endforeach