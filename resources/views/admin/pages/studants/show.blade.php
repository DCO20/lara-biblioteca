@extends('admin.master.master')

@section('title', 'Informações do aluno')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('studants.index')}}"><i class="fas fa-graduation-cap" aria-hidden="true"></i> Alunos</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('studants.show', $studant->id)}}"><i class="fas fa-graduation-cap"></i> Informaçoẽs do aluno</a>
    </li>
@endsection

@section('content')

<div class="container-fluid">
    <div class="panel shadow">
        <div class="header">
            <h3 class="title"><i class="fa fa-edit" aria-hidden="true"></i> Informações do Aluno</h3>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="page_user">
        <div class="row">
            <div class="col-md-4 mtop16">
                <div class="panel shadow">
                    <div class="inside">
                    @include('admin.includes.alerts')
                        <div class="mini_profile">
                            <div class="info">
                                <span class="title"><i class="far fa-address-card" aria-hidden="true"></i> Nome:</span>
                                <span class="text">{{ $studant->name}}</span>
                                <span class="title"><i class="fas fa-restroom" aria-hidden="true"></i> Gênero:</span>
                                <span class="text">{{ $studant->genre}}</span>
                                <span class="title"><i class="far fa-calendar-alt" aria-hidden="true"></i> Data de nascimento:</span>
                                <span class="text">{{ $studant->date_of_birth}}</span>
                                <span class="title"><i class="fas fa-passport" aria-hidden="true"></i> Documento:</span>
                                <span class="text">{{ $studant->document}}</span>
                                
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col-md-4 mtop16">
                <div class="panel shadow">
                    <div class="inside">
                    @include('admin.includes.alerts')
                        <div class="mini_profile ">
                            <div class="info">
                                <span class="title"><i class="fa fa-keyboard" aria-hidden="true"></i> CEP:</span>
                                <span class="text">{{ $studant->zipcode}}</span>
                                <span class="title"><i class="fas fa-road" aria-hidden="true"></i> Rua:</span>
                                <span class="text">{{ $studant->street}}</span>
                                <span class="title"><i class="fas fa-phone-square" aria-hidden="true"></i> Número:</span>
                                <span class="text">{{ $studant->number}}</span>
                                <span class="title"><i class="fa fa-keyboard" aria-hidden="true"></i> Complemento:</span>
                                <span class="text">{{ $studant->complement}}</span>  
                            </div>
                        </div>  
                    </div> 
                </div>
            </div>
            <div class="col-md-4 mtop16">
                <div class="panel shadow">
                    <div class="inside">
                    @include('admin.includes.alerts')
                        <div class="mini_profile ">
                            <div class="info">
                                <span class="title"><i class="fa fa-keyboard" aria-hidden="true"></i> Bairro:</span>
                                <span class="text">{{ $studant->neighborhood}}</span>
                                <span class="title"><i class="fab fa-usps" aria-hidden="true"></i> Estado:</span>
                                <span class="text">{{ $studant->state}}</span>
                                <span class="title"><i class="fas fa-city" aria-hidden="true"></i> Cidade:</span>
                                <span class="text">{{ $studant->city}}</span>
                                <span class="title"><i class="fas fa-mobile-alt" aria-hidden="true"></i> Celular:</span>
                                <span class="text">{{ $studant->cell}}</span>  
                            </div>
                        </div>  
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection