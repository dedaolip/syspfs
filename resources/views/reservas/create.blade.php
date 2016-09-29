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
                            <label for="date" class="col-md-1 control-label">Data</label>
                            <div class="col-md-3">
                                <input id="date" type="Date" class="col-md-1 form-control" name="date" value="<?php echo $dados->date;?>" readonly="readonly">
                            </div>

                            <label for="hbegin" class="col-md-1 control-label">Início</label>
                            <div class="col-md-2">
                                <input id="hbegin" type="Time" class="col-md-1 form-control" name="hbegin" value="<?php echo $dados->hbegin;?>" readonly="readonly">
                            </div>

                            <label for="hend" class="col-md-1 control-label">Fim</label>
                            <div class="col-md-2">
                                <input id="hend" type="Time" class="col-md-1 form-control" name="hend" value="<?php echo $dados->hend;?>" readonly="readonly">
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
                            <label for="id_proj" class="col-md-4 control-label">Projetores Disponíveis</label>
                            <div class="col-md-5">
                                <select class="form-control" name="id_proj">
                                        <?php foreach($projetores as $projetor): ?>
                                            <option value="<?php echo $projetor->id?>"><?php echo $projetor->name?></option>
                                        <?php endforeach;?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_not" class="col-md-4 control-label">Notebooks Disponíveis</label>
                            <div class="col-md-5">
                                <select class="form-control" name="id_not">
                                        <?php foreach($notebooks as $notebook): ?>
                                            <option value="<?php echo $notebook->id?>"><?php echo $notebook->name?></option>
                                        <?php endforeach;?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_sound" class="col-md-4 control-label">Aparelhos de Som Disponíveis</label>
                            <div class="col-md-5">
                                <select class="form-control" name="id_sound">
                                        <?php foreach($sons as $som): ?>
                                            <option value="<?php echo $som->id?>"><?php echo $som->name?></option>
                                        <?php endforeach;?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_mic" class="col-md-4 control-label">Microfones Disponíveis</label>
                            <div class="col-md-5">
                                <select class="form-control" name="id_mic">
                                        <?php foreach($microfones as $microfone): ?>
                                            <option value="<?php echo $microfone->id?>"><?php echo $microfone->name?></option>
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
