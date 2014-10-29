@extends ('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Sign Up</h1>
            {{ Form::open(['route' => 'register', 'role' => 'form', 'novalidate']) }}
            
            {{ Field::text('full_name') }}

            {{ Field::email('email') }}

            {{ Field::password('password') }}

            {{ Field::password('password_confirmation', ['placeholder' => 'Confirma tu contraseña']) }}

            {{ Form::submit('Register', ['class' => 'btn btn-success']) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@stop