<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="{{route('admin.posts.store')}}">
        {{csrf_field()}}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Agrega el título de la publicación*') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{--                        <label {{ $errors->has('title') ? 'class=text-red' : '' }} for="title">{{ __('Título de la publicación*') }}</label>--}}
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{old('title')}}" id="title" name="title" placeholder="{{ __('Ingresa aquí el título de la publicación') }}" required>
                        {!! $errors->first('title', '<span class="error invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancelar') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Crear publicación') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>