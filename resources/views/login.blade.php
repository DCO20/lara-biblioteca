@extends('auth.master.master')

@section('title', 'Login')

@section('content')
    <div class="box box_login shadow">
        <div class="header">
            <a href="{{ url('/')}}">
                <img src="{{ url('/static/images/logo.png')}}" alt="">
            </a>
        </div>
        <div class="inside">
        {!! Form::open(['route' => 'login']) !!}
        <label for="email">Email:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="far fa-envelope-open" aria-hidden="true"></i></div>
            </div>
        {!! Form::text('email', null,  [ 'class' => 'form-control', 'required']) !!}
        </div>

        <label for="password" class="mtop16">Senha:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-lock" aria-hidden="true"></i></div>
            </div>
        {!! Form::password('password', [ 'class' => 'form-control', 'required']) !!}
        </div>  
        {!! Form::submit('Entrar', [ 'class' => 'btn btn-success mtop16']) !!}
        {!! Form::close() !!}
        
        <div class=" footer mtop16">
            <a href="">Esqueceu a senha?</a>
        </div>
        </div>
    </div>
@endsection

