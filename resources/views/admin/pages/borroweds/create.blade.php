@extends('admin.master.master')

@section('title', 'Novo Livro Emprestado')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('borroweds.index')}}"><i class="fas fa-book-reader" aria-hidden="true"></i> Novo Livro Emprestado</a>
    </li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h3 class="title"><i class="fas fa-book-reader" aria-hidden="true"></i> Novo livro emprestado</h3>
        </div>

        <div class="inside">
        
        @include('admin.includes.alerts')

        {!! Form::open(['route' => 'borroweds.store']) !!}
        <div class="row">
        
            <div class="col-md-4">
            <label for="libro_id">Livro:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basuc-addon1">
                            <i class="fas fa-book" aria-hidden="true"></i> 
                        </span>
                    </div>
                    {!! Form::select('libro_id', $libros, 0, ['class' => 'custom-select']) !!}
                </div>   
            </div>
            <div class="col-md-4">
            <label for="user_id">Emprestado por:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basuc-addon1">
                            <i class="fa fa-user" aria-hidden="true"></i> 
                        </span>
                    </div>
                    {!! Form::select('user_id', $users, 0, ['class' => 'custom-select']) !!}
                </div>   
            </div>
            <div class="col-md-4">
                <label for="name_std">Responsavel:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa fa-user" aria-hidden="true"></i> 
                        </span>
                    </div>
                    {!! Form::text('name_std', null,  [ 'class' => 'form-control']) !!}
                    </div>   
                </div>
            <div class="col-md-4 mtop16">
            <label for="studant_id">Emprestado a :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basuc-addon1">
                            <i class="fas fa-graduation-cap" aria-hidden="true"></i> 
                        </span>
                    </div>
                    {!! Form::select('studant_id', $studants, 0, ['class' => 'custom-select']) !!}
                </div>   
            </div>
            <div class="col-md-4 mtop16">
                <label for="token_borrowed">Emprestado em:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    {!! Form::date('token_borrowed', null, [ 'class' => 'form-control', 'mask-date']) !!}
                </div>   
            </div>
            <div class="col-md-4 mtop16">
                <label for="token_returned">Prazo para devolver:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                    </div>
                    {!! Form::date('token_returned', null, [ 'class' => 'form-control', 'mask-date']) !!}
                </div>   
            </div>

            <div class="row mtop16">
                <div class="col-md-12">
                {!! Form::submit('Cadastar', [ 'class' => 'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection