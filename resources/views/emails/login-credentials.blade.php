@component('mail::message')
# {{__('Tus credenciales para acceder a ')}} {{ config('app.name') }}

{{__('Utiliza estas credenciales para acceder al sistema')}}

@component('mail::table')
    | {{ __('Usuario') }} | {{ __('Contraseña') }} |
    |:------------------- |:---------------------- |
    | {{ $user->email }}  | {{ $password }} |
@endcomponent

@component('mail::button', ['url' => url('login')])
    {{ __('Login') }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
