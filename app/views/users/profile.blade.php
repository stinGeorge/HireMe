@extends ('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Edita tu perfil</h1>
            {{ Form::model($candidate, ['route' => 'update_profile', 'method' => 'PUT', 'role' => 'form', 'novalidate']) }}
            
            {{ Field::url('website_url') }}
            
            {{ Field::textarea('description') }}

            {{ Field::select('job_type', $job_types) }}

            {{ Field::select('category_id', $categories) }}

            {{ Field::checkbox('available') }}

            {{ Form::submit('Guardar Perfil', ['class' => 'btn btn-success']) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@stop