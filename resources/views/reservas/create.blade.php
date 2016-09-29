@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reserva de Sala</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('romm.store')!!}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="date" class="col-md-1 control-label">Data</label>
                            <div class="col-md-3">
                                <input id="date" type="Date" class="col-md-1 form-control" name="date" value="<?php echo $dados->date;?>">
                            </div>

                            <label for="hbegin" class="col-md-1 control-label">Início</label>
                            <div class="col-md-2">
                                <input id="hbegin" type="Time" class="col-md-1 form-control" name="hbegin" value="<?php echo $dados->hbegin;?>">
                            </div>

                            <label for="hend" class="col-md-1 control-label">Fim</label>
                            <div class="col-md-2">
                                <input id="hend" type="Time" class="col-md-1 form-control" name="hend" value="<?php echo $dados->hend;?>">
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
