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
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach($romms as $romm): ?>
                            <tr>
                                <td style="vertical-align: middle"><?php echo $romm->id;?></td>
                                <td style="vertical-align: middle"><?php echo $romm->name;?></td>
                                <td style="vertical-align: middle"><?php echo $romm->email;?></td>
                                <td style="vertical-align: middle">
                                    <p><a href="{!! route('romm.edit', ['id' => $romm->id]) !!}">Editar</a></p>
                                    <p><a href="{!! route('romm.destroy', ['id' => $romm->id]) !!}">Deletar</a></p>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>

                        </table>

                        <div class="col-lg-10 text-center">
                            {!! $romms->render() !!}
                        </div>

                        <div class="col-lg-10">
                            <a href="usuarios\create" class="col-lg-10">Novo</a>
                            

                            
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
