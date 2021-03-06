@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Aparelho de Som</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('sound.update', ['id' => $sound->id]) !!}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo $sound->name;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="brand" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control" name="brand" value="<?php echo $sound->brand;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="model" class="col-md-4 control-label">Modelo</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control" name="model" value="<?php echo $sound->model;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="patrimony" class="col-md-4 control-label">nº de Patrimônio</label>

                            <div class="col-md-6">
                                <input id="patrimony" type="text" class="form-control" name="patrimony" value="<?php echo $sound->patrimony;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="office" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select id="status" class="form-control" name="status">
                                        <option value="A" <?php if ($sound->status == "A"){echo "selected";};?>>Ativo</option>
                                        <option value="I" <?php if ($sound->status == "I"){echo "selected";};?>>Inativo</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dtaacquisition" class="col-md-4 control-label">Data de Aquisição</label>

                            <div class="col-md-6">
                                <input id="dtaacquisition" type="date" class="form-control" name="dtaacquisition" value="<?php echo $sound->dtaacquisition;?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                                <input name="_method" type="hidden" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="<?php echo $sound->id;?>">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
