@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastros</div>

                <div class="panel-body control-label">               
                    <p>
                        <a href="{!! route('user.index') !!}" class="btn btn-default btn-lg active" style="color: black; margin-right: 15px;margin-left: 15px">Usuários</a>
                        
                        <a href="{!! route('romm.index') !!}" class="btn btn-default btn-lg active" style="color: black; margin-right: 15px;margin-left: 15px">Salas</a>
                        
                        <a href="{!! route('not.index') !!}" class="btn btn-default btn-lg active" style="color: black; margin-right: 15px;margin-left: 15px">Notebooks</a>

                        <a href="{!! route('mic.index') !!}" class="btn btn-default btn-lg active" style="color: black; margin-right: 15px;margin-left: 15px">Microfones</a>

                        <a href="{!! route('project.index') !!}" class="btn btn-default btn-lg active" style="color: black; margin-right: 15px;margin-left: 15px">Projetores</a>

                        <a href="{!! route('sound.index') !!}" class="btn btn-default btn-lg active" style="color: black; margin-right: 15px;margin-left: 15px">Aparelhos de Som</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
