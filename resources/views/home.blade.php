@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p><a href="{!! route('user.index') !!}" style="color: black">Usuários</a></p>
                    <p><a href="{!! route('romm.index') !!}" style="color: black">Salas</a></p>
                    <p><a href="{!! route('not.index') !!}" style="color: black">Notebooks</a></p>
                    <p><a href="{!! route('mic.index') !!}" style="color: black">Microfones</a></p>
                    <p><a href="{!! route('project.index') !!}" style="color: black">Projetores</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
