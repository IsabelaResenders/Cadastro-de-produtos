<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuario</title>
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
        .btn{
            background-color: purple;
            border-radius: 10px;
            border: none;
            padding: 10px;
            text-transform: none;
            color: #fff;
            text-decoration: none;
            height: 100%;
        }
        form{
            display: grid;
        }
        .erro{
            color: red
        }
    </style>
    <section>
        <div class="espacamento">
            <div class="cardzao">
                <div class="card-title">
                    <h2>Edite dados!</h2>
                </div>
                @if (Session::has('erro'))
                    <span class="erro">{{Session::get('erro')}}</span>
                @endif
                <div class="card-form">
                    <form action="{{ route('EditUser')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" id="" value="{{$user->id}}">
                        <label for="">Nome Completo</label>
                        <input type="text" name="full_name" value="{{$user->name}}" placeholder="Insira seu nome completo">
                        @error('full_name')
                            <span class="erro">{{$message}}</span>
                        @enderror
                        <label for="">E-mail</label>
                        <input type="email" name="email" placeholder="Insira seu E-mail" value="{{$user->email}}">
                        @error('email')
                            <span class="erro">{{$message}}</span>
                        @enderror
                        <label for="">Telefone</label>
                        <input type="text" name="phone_number" placeholder="Insira seu número" value="{{$user->phone_number}}">
                        @error('phone_number')
                            <span class="erro">{{$message}}</span>
                        @enderror
                        <button type="submit" class="btn">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>