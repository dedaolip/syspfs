@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Projetores</div>

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
                            
                            <?php foreach($projects as $project): ?>
                            <tr>
                                <?php 
                                    if($project->status == 'A')
                                        {$status = 'Ativo';};
                                    if($project->status == 'I')
                                        {$status = 'Inativo';} ?>
                                <td style="vertical-align: middle"><?php echo $project->id;?></td>
                                <td style="vertical-align: middle"><?php echo $project->name;?></td>
                                <td style="vertical-align: middle"><?php echo $project->brand;?></td>
                                <td style="vertical-align: middle"><?php echo $project->model;?></td>
                                <td style="vertical-align: middle"><?php echo $status;?></td>
                                <td style="vertical-align: middle">
                                    <p><a href="{!! route('project.edit', ['id' => $project->id]) !!}">Editar</a></p>
                                    <p><a href="{!! route('project.destroy', ['id' => $project->id]) !!}">Deletar</a></p>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>

                        </table>

                        <div class="col-lg-10">
                            <a href="{!! route('project.create') !!}" class="btn btn-primary">Novo</a>
                            

                            
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
