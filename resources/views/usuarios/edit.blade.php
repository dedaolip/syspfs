@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuário <?php echo $usuario->name;?></div>
                <div class="panel-body">
                    <!-- <form class="form-horizontal" role="form" method="POST" action="{!! route('user.update', ['id' => $usuario->id]) !!}"> -->
                    <form id="uCustomerForm" action="{!! route('user.update', ['id' => $usuario->id]) !!}" method="post" class="form-horizontal ng-pristine ng-valid" name="uCustomerForm" role="form">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo $usuario->name;?>" readonly="readonly">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo $usuario->email;?>" readonly="readonly">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('office') ? ' has-error' : '' }}">
                            <label for="office" class="col-md-4 control-label">Cargo</label>

                            <div class="col-md-6">
                                <!--<input id="office" type="number" class="form-control" name="office" value="<?php echo $usuario->office;?>"> -->
                                <select id="office" class="form-control" name="office" value="<?php echo $usuario->office;?>">
                                        <?php if ($usuario->office == 1){
                                            echo "<option value=\"1\">Administrador</option>";};?>
                                        <option value="2" <?php if ($usuario->office == 2){echo "selected";};?>>Professor</option>
                                        <option value="3" <?php if ($usuario->office == 3){echo "selected";};?>>Funcionário</option>
                                </select>

                                @if ($errors->has('office'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('office') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Nova Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Alterar
                                </button>
                                <input name="_method" type="hidden" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="<?php echo $usuario->id;?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
