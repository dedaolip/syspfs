@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reserva de Sala</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('reserve.store')!!}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="dia_inical" class="col-md-2 control-label">Data Inical</label>
                            <div class="col-md-3">
                                <input id="dia_inical" type="Date" class="col-md-1 form-control" name="dia_inical">
                            </div>

                            <label for="dia_final" class="col-md-2 control-label">Data Final</label>
                            <div class="col-md-3">
                                <input id="dia_final" type="Date" class="col-md-1 form-control" name="dia_final">
                            </div>

                            
                        </div>

                        <div class="form-group">
                            <label for="dia_semana" class="col-md-2 control-label">Dia da Semana</label>
                            <div class="col-md-5">
                                <select class="form-control" name="dia_semana">
                                        <option value="1">Segunda</option>
                                        <option value="2">Terça</option>
                                        <option value="3">Quarta</option>
                                        <option value="4">Quinta</option>
                                        <option value="5">Sexta</option>
                                        <option value="6">Sabado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">

                            <label for="h_inicio" class="col-md-2 control-label">Hora Inicial</label>
                            <div class="col-md-3">
                                <input id="h_inicio" type="Time" class="col-md-1 form-control" name="hbegin" required="required">
                            </div>

                            <label for="h_fim" class="col-md-2 control-label">Hora Final</label>
                            <div class="col-md-3">
                                <input id="h_fim" type="Time" class="col-md-1 form-control" name="hbegin" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_romm" class="col-md-4 control-label">Salas Disponíveis</label>
                            <div class="col-md-5">
                                <select class="form-control" name="id_romm">
                                        <?php foreach($salas as $sala): ?>
                                            <option value="<?php echo $sala->id?>"><?php echo $sala->name?></option>
                                        <?php endforeach;?>
                                </select>
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reservar
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
