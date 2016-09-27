@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Sala</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('romm.update', ['id' => $romm->id]) !!}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo $romm->name; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="office" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select id="status" class="form-control" name="status">
                                        <option value="A" <?php if ($romm->status == "A"){echo "selected";};?>>Ativo</option>
                                        <option value="I" <?php if ($romm->status == "I"){echo "selected";};?>>Inativo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Salvar
                                </button>
                                <input name="_method" type="hidden" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="<?php echo $romm->id;?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
