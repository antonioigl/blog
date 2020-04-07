@foreach($permissions as $id => $name)
    <div class="checkbox">
        <label for="permissions-{{$id}}">
            <input name="permissions[]" id="permissions-{{$id}}" type="checkbox" value="{{ $id }}" {{ $user->permissions->contains($id) ? 'checked' : ''}}>
            {{ $name }}
        </label>
    </div>
@endforeach