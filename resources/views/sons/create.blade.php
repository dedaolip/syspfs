@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Aparelho de SOm</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('sound.store')!!}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="brand" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control" name="brand" value="{{ old('brand') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="model" class="col-md-4 control-label">Modelo</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="patrimony" class="col-md-4 control-label">nº de Patrimônio</label>

                            <div class="col-md-6">
                                <input id="patrimony" type="text" class="form-control" name="patrimony" value="{{ old('patrimony') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dtaacquisition" class="col-md-4 control-label">Data de Aquisição</label>

                            <div class="col-md-6">
                                <input id="dtaacquisition" type="date" class="form-control" name="dtaacquisition">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
