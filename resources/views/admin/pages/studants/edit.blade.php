@extends('admin.master.master')

@section('title', 'Novo Aluno')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('studants.index')}}"><i class="fas fa-graduation-cap" aria-hidden="true"></i> Alunos</a>
    </li>
    <li class="breadcrumb-item">
        <a href=""><i class="fa fa-edit" aria-hidden="true"></i> Editar Aluno</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h3 class="title"><i class="fa fa-edit" aria-hidden="true"></i> Editar Aluno</h3>
            </div>

            <div class="inside">
            
            @include('admin.includes.alerts')

            {!! Form::open(['url' => '/admin/studants/'.$studant->id.'/edit' ]) !!}
            <div class="row">
                <div class="col-md-3">
                    <label for="name">Nome:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-keyboard" aria-hidden="true"></i> 
                            </span>
                        </div>
                        {!! Form::text('name', $studant->name,  [ 'class' => 'form-control']) !!}
                    </div>   
                </div>

                <div class="col-md-3">
                    <label for="genre">Gênero:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-restroom" aria-hidden="true"></i> 
                            </span>
                        </div>
                        {!! Form::text('genre',$studant->genre, ['class' => 'form-control']) !!}
                    </div>   
                 </div>

                <div class="col-md-3">
                    <label for="date_of_birth">Data de nascimento:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        {!! Form::text('date_of_birth', $studant->date_of_birth, [ 'class' => 'form-control', 'mask-date']) !!}
                    </div>   
                </div>
                <div class="col-md-3">
                    <label for="document">Documento:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basuc-addon1">
                                <i class="fas fa-passport"></i>
                            </span>
                        </div>
                        {!! Form::text('document', $studant->document, [ 'class' => 'form-control','disabled']) !!}
                    </div>   
                </div>
                <div class="col-md-3 mtop16">
                    <label for="zipcode">CEP:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-keyboard" aria-hidden="true"></i> 
                            </span>
                        </div>
                        {!! Form::text('zipcode', $studant->zipcode,  [ 'class' => 'form-control']) !!}
                    </div>   
                </div>
            
                <div class="col-md-3 mtop16">
                    <label for="street">Rua:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-road"></i>
                            </span>
                        </div>
                        {!! Form::text('street', $studant->street, ['class' => 'form-control']) !!}
                    </div>   
                </div>
            
                <div class="col-md-3 mtop16">
                    <label for="number">Número:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-sort-numeric-up-alt"></i>
                            </span>
                        </div>
                        {!! Form::text('number', $studant->number,  [ 'class' => 'form-control']) !!}
                    </div>   
                </div>
                <div class="col-md-3 mtop16">
                    <label for="complement">Complemento:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basuc-addon1">
                                <i class="fa fa-keyboard"></i>
                            </span>
                        </div>
                        {!! Form::text('complement', $studant->complement, [ 'class' => 'form-control']) !!}
                    </div>   
                </div>
                <div class="col-md-3 mtop16">
                    <label for="neighborhood">Bairro:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fa fa-keyboard" aria-hidden="true"></i> 
                            </span>
                        </div>
                        {!! Form::text('neighborhood', $studant->neighborhood,  [ 'class' => 'form-control']) !!}
                    </div>   
                </div>
            
                <div class="col-md-3 mtop16">
                    <label for="state">Estado:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fab fa-usps"></i> 
                            </span>
                        </div>
                        {!! Form::text('state', $studant->state, ['class' => 'form-control']) !!}
                    </div>   
                </div>
            
                <div class="col-md-3 mtop16">
                    <label for="city">Cidade:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-city"></i>
                            </span>
                        </div>
                        {!! Form::text('city', $studant->city,  [ 'class' => 'form-control']) !!}
                    </div>   
                </div>
                <div class="col-md-3 mtop16">
                    <label for="cell">Celular:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basuc-addon1">
                                <i class="fas fa-mobile-alt"></i>
                            </span>
                        </div>
                        {!! Form::text('cell', $studant->cell, [ 'class' => 'form-control']) !!}
                    </div>   
                </div>
                <div class="row mtop16">
                    <div class="col-md-12">
                    {!! Form::submit('Atualizar', [ 'class' => 'btn btn-success']) !!}
                    </div>
                </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection