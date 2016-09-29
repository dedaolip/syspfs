@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

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
                            
                            <?php foreach($sounds as $sound): ?>
                            <tr>
                                <?php 
                                    if($sound->status == 'A')
                                        {$status = 'Ativo';};
                                    if($sound->status == 'I')
                                        {$status = 'Inativo';} ?>
                                <td style="vertical-align: middle"><?php echo $sound->id;?></td>
                                <td style="vertical-align: middle"><?php echo $sound->name;?></td>
                                <td style="vertical-align: middle"><?php echo $sound->brand;?></td>
                                <td style="vertical-align: middle"><?php echo $sound->model;?></td>
                                <td style="vertical-align: middle"><?php echo $status;?></td>
                                <td style="vertical-align: middle">
                                    <p><a href="{!! route('sound.edit', ['id' => $sound->id]) !!}">Editar</a></p>
                                    <p><a href="{!! route('sound.destroy', ['id' => $sound->id]) !!}">Deletar</a></p>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>

                        </table>

                        <div class="col-lg-10">
                            <a href="{!! route('sound.create') !!}" class="col-lg-10">Novo</a>
                            

                            
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
