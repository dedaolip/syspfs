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
                                <th>e-mail</th>
                                <th>Ação</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach($users as $user): ?>
                            <tr>
                                <td style="vertical-align: middle"><?php echo $user->id;?></td>
                                <td style="vertical-align: middle"><?php echo $user->name;?></td>
                                <td style="vertical-align: middle"><?php echo $user->email;?></td>
                                <td style="vertical-align: middle">
                                    <p><a href="{!! route('user.edit', ['id' => $user->id]) !!}">Editar</a></p>
                                    <p><a href="{!! route('user.destroy', ['id' => $user->id]) !!}">Deletar</a></p>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>

                        </table>

                        <div class="col-lg-10 text-center">
                            {!! $users->render() !!}
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
