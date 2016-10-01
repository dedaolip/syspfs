@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Microfones</div>

                <div class="panel-body">
                    <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                            </thead>

                            <tbody>
                            
                            <?php foreach($mics as $mic): ?>
                            <tr>
                                <?php 
                                    if($mic->status == 'A')
                                        {$status = 'Ativo';};
                                    if($mic->status == 'I')
                                        {$status = 'Inativo';} ?>
                                <td style="vertical-align: middle"><?php echo $mic->name;?></td>
                                <td style="vertical-align: middle"><?php echo $mic->brand;?></td>
                                <td style="vertical-align: middle"><?php echo $mic->model;?></td>
                                <td style="vertical-align: middle"><?php echo $status;?></td>
                                <td style="vertical-align: middle">
                                    <p><a href="{!! route('mic.edit', ['id' => $mic->id]) !!}">Editar</a></p>
                                    <p><a href="{!! route('mic.destroy', ['id' => $mic->id]) !!}">Deletar</a></p>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>

                        </table>

                        <div class="col-lg-10">
                            <a href="{!! route('mic.create') !!}" class="btn btn-primary">Novo</a>
                            

                            
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
