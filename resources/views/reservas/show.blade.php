 @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Reservas</h4></div>

                <div class="panel-body">
                            <h3>Reservar</h3>
                            <form class="form-horizontal" role="form" method="POST" action="{!! route('reserve.create')!!}">
                                <div class="form-group">

                                    <div class="col-md-3">
                                        <label for="date" class="col-md-2 control-label">Data</label>
                                        <input id="date" type="Date" class="form-control" name="date" required="required">
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <label for="hbegin" class="col-md-2 control-label">Início</label>
                                        <input id="hbegin" type="Time" class="form-control" name="hbegin" required="required">
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <label for="hend" class="col-md-2 control-label">Fim</label>
                                        <input id="hend" type="Time" class="form-control" name="hend" required="required">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="hend" class="col-md-5 control-label">&nbsp;</label>
                                        <button type="submit" class="btn btn-primary">
                                            Reservar
                                        </button>
                                        <input id="id_usuario" type="hidden" name="id_usuario" value="<?php echo Auth::user()->id;?>">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div>
                                </div>
                            </form>

                             <h3>Reservas para o dia <?php echo date('d-m-Y', strtotime($data));?></h3> 

                            <form class="form-horizontal" role="form" method="GET" action="{!! route('reserve.index')!!}">
                                <div class="form-group">
                                    <label for="data" class="col-md-2 control-label">Alterar data</label>

                                    <div class="col-md-3">
                                        <input id="data" type="date" class="form-control" name="data" value="<?php echo date('d-m-Y', strtotime($data));?>">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary">
                                            Alterar
                                        </button>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </div>
                                </div>
                            </form>

                            <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Sala</th>
                                <th>Projetor</th>
                                <th>Notebook</th>
                                <th>Som</th>
                                <th>Microfone</th>
                                <th>Data</th>
                                <th>Início</th>
                                <th>Fim</th>
                            </tr>
                            </thead>

                            <tbody>
                            
                            <?php foreach($reserves as $reserve): ?>
                            <tr>
                                <td style="vertical-align: middle"><?php echo $reserve->usuario;?></td>
                                <td style="vertical-align: middle"><?php echo $reserve->sala;?></td>
                                <td style="vertical-align: middle"><?php echo $reserve->projetor;?></td>
                                <td style="vertical-align: middle"><?php echo $reserve->notebook;?></td>
                                <td style="vertical-align: middle"><?php echo $reserve->som;?></td>
                                <td style="vertical-align: middle"><?php echo $reserve->microfone;?></td>
                                <td style="vertical-align: middle"><?php echo date('d-m-Y', strtotime($reserve->data));?></td>
                                <td style="vertical-align: middle"><?php echo $reserve->inicio;?></td>
                                <td style="vertical-align: middle"><?php echo $reserve->final;?></td>
                                
                            </tr>
                            <?php endforeach;?>
                            </tbody>

                        </table>

                        

                        <div class="col-lg-10">
                            <a href="{!! route('reserve.create') !!}" class="col-lg-10">Novo</a>    
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection