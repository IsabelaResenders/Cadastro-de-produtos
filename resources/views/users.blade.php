<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud DevWeb</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>  
        .espacamento{
            max-width: 1200px;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: justify;
            justify-content: space-between;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        th{
            padding: 10px;
            border: 2px solid #000;
        }
        .w-100{
            width: 100%;
        }
        .cardzao{
            padding: 10px;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
            border: none;
            border-radius: 10px;
          
        }
        .btn-add{
            background-color: purple;
            border-radius: 10px;
            border: none;
            padding: 10px;
            text-transform: none;
            color: #fff;
            text-decoration: none;
            height: 100%;
        }
        .card-title{
            display: flex;
            justify-content: space-between
        }
        td{
            padding: 15px;
            border: 1px solid #000;
            text-align: center;
        }
        .btn-editar{
            padding: 10px;
            margin: 5px;
            border-radius: 10px;
            background-color: green;
            color: #fff;
            text-decoration: none;
            display: block;
            margin-bottom: 20px
        }
        .btn-deletar{
            padding: 10px;
            margin: 5px;
            border-radius: 10px;
            background-color: red;
            color: #fff;
            text-decoration: none;
        }
        .alerta-sucesso{
            background: rgb(48,107,5);
            background: linear-gradient(90deg, rgba(48,107,5,1) 0%, rgba(0,255,42,1) 50%, rgba(48,107,5,1) 100%);
            padding: 10px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            color: #000;
        }
        .alerta-erro{
            background: rgb(255,109,0);
            background: linear-gradient(90deg, rgba(255,109,0,1) 0%, rgba(255,0,0,1) 50%, rgba(255,111,0,1) 93%, rgba(255,111,0,1) 100%);
            padding: 10px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            color: #000;
        }
        @media only screen and (max-width: 600px) {
            table {
            overflow-x: auto; /* Adiciona uma barra de rolagem horizontal em telas menores */
            display: block;
            }
            table th, table td {
            white-space: nowrap; /* Evita que o texto quebre em várias linhas */
            }
            .w-100{
                width: 94%;
            }
        }
    </style>
    <section>
        <div class="espacamento">
            <div class="w-100 cardzao">
                <div class="card-title d-flex">
                    <h3>Cadastro de Produtos</h3>
                    <a href="/add/user" class="btn-add">Adicionar Usuario</a>
                </div>
                @if (Session::has('sucesso'))
                    <span class="alerta-sucesso">{{Session::get('sucesso')}}</span>
                @endif
                @if (Session::has('erro'))
                    <span class="alerta-erro">{{Session::get('erro')}}</span>
                @endif
                <div class="card-body">
                    <table class="w-100">
                        <thead>
                            <th>ID</th>
                            <th>Nome Completo</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Data registro</th>
                            <th>Ultimo registro</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            @if (count($all_users) > 0)
                                @foreach ($all_users as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone_number}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td><a href="/edit/{{$item->id}}" class="btn-editar">Editar</a>
                                        <a href="/delete/{{$item->id}}" class="btn-deletar">Apagar</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">Nenhum usuario encontrado!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>