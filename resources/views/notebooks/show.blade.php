@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Notebooks</div>

                <div class="panel-body">
                    <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                            </thead>

                            <tbody>
                            
                            <?php foreach($nots as $not): ?>
                            <tr>
                                <?php 
                                    if($not->status == 'A')
                                        {$status = 'Ativo';};
                                    if($not->status == 'I')
                                        {$status = 'Inativo';} ?>
                                <td style="vertical-align: middle"><?php echo $not->id;?></td>
                                <td style="vertical-align: middle"><?php echo $not->name;?></td>
                                <td style="vertical-align: middle"><?php echo $not->brand;?></td>
                                <td style="vertical-align: middle"><?php echo $not->model;?></td>
                                <td style="vertical-align: middle"><?php echo $status;?></td>
                                <td style="vertical-align: middle">
                                    <p><a href="{!! route('not.edit', ['id' => $not->id]) !!}">Editar</a></p>
                                    <p><a href="{!! route('not.destroy', ['id' => $not->id]) !!}">Deletar</a></p>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>

                        </table>

                        <div class="col-lg-10">
                            <a href="{!! route('not.create') !!}" class="btn btn-primary">Novo</a>
                            

                            
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
