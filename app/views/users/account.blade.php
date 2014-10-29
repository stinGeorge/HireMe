@extends ('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Edita tu cuenta de usuario</h1>
            {{ Form::model($user, ['route' => 'update_account', 'method' => 'PUT', 'role' => 'form', 'novalidate']) }}
            
            {{ Field::text('full_name') }}

            {{ Field::email('email') }}

            {{ Field::password('password') }}

            {{ Field::password('password_confirmation', ['placeholder' => 'Confirma tu contraseña']) }}

            {{ Form::submit('Update', ['class' => 'btn btn-success']) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@stop