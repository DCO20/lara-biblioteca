@extends('admin.master.master')

@section('title', 'Usuários')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('users.index')}}"><i class="fa fa-users" aria-hidden="true"></i> Usuários</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h3 class="title"><i class="fa fa-users" aria-hidden="true"></i> Usuários</h3>
            </div>

            <div class="mtop16">
                @include('admin.includes.alerts')
            </div>

            <div class="btns">
                <a href="{{ route('users.create')}}" class="btn btn-primary">
                     <i class="fa fa-plus"></i> Novo
                 </a>
             </div>

            <div class="col-md-12 mtop16">
                {!! Form::open(['route' => 'users.search']) !!}
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    {!! Form::text('filter', null, ['class' => 'form-control',  'placeholder' => 'Digite o nome ou o email', 'required']) !!}
                    <button class="btn btn-success" type="submit" id="button-addon2">Buscar</button>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="inside">
                <table class="table">
                    <thead>
                        <tr>
                            <td></td>
                            <td>Nome</td>
                            <td>Email</td>
                            <td width="160"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td width="64">
                            @if(is_null(Auth::user()->avatar ))
                                <img src="{{ url('/static/images/user-default.png') }}" class="img-fluid rounded-circle">
                            @else
                            <img src="{{ url("storage/{$user->avatar}") }}" alt="{{ $user->name }}" style="max-width: 72px;">
                            @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                               <div class="opts">
                                    <a href="{{ route('users.show', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Informações do usuário">
                                        <i class="fas fa-user"></i></a>

                                    <a href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Editar">
                                        <i class="fa fa-edit" aria-hidden="true"></i></a>
                                   
                                    
                                    <a href="{{ route('users.destroy', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Excluir">
                                        <i class="fa fa-trash-alt" aria-hidden="true"></i></a>
                                    
                                   
                               </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection