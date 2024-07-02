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
            height: 100vh;
            margin: auto;
            max-width: 1000px;
            display: flex;
        	align-items: center;
            flex-wrap: wrap;
      
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
            margin-top:20px;
        }
        form{
            display: grid;
        }
        .erro{
            color: red
        }

        .titulo{
            font-size: 2em;
            color: purple;
            font-weight: bold;
            text-align: center;
            margin-bottom: 144px;
            
        }
        .cardzao {
            
            width: 100%;
        }
        input{ 
            padding: 8px 8px;
            border-radius: 8px;
            outline: none;
            border: 1px solid gray;
            margin-bottom: 16px;
            margin-top: 4px;
        }
        .section-add-product{
            height: 100vh;
        }
    </style>
    <section class='section-add-product'>
        <div class="espacamento center">
            
            <div class="cardzao">
            <h1 class="titulo">Cadastro de Usuários</h1>

                <div class="card-title">
                    <h2>Insira seus dados!</h2>
                </div>
                @if (Session::has('erro'))
                    <span class="erro">{{Session::get('erro')}}</span>
                @endif
                <div class="card-form">
                    <form action="{{ route('AddUser')}}" method="post">
                        @csrf
                        <label for="">Nome Completo</label>
                        <input type="text" name="full_name" id="full_name" value="{{old('full_name')}}" placeholder="Insira seu nome completo">
                        @error('full_name')
                            <span class="erro">{{$message}}</span>
                        @enderror
                        <label for="">E-mail</label>
                        <input type="email" name="email" placeholder="Insira seu E-mail" value="{{old('email')}}">
                        @error('email')
                            <span class="erro">{{$message}}</span>
                        @enderror
                        <label for="">Telefone</label>
                        <input type="text" name="phone_number" id="phone_number" placeholder="Insira seu número" value="{{old('phone_number')}}">
                        @error('phone_number')
                            <span class="erro">{{$message}}</span>
                        @enderror
                        <label for="">Senha</label>
                        <input type="password" name="password" placeholder="Insira sua senha" value="{{old('password')}}">
                        @error('password')
                            <span class="erro">{{$message}}</span>
                        @enderror
                        <label for="">Confirmar Senha</label>
                        <input type="password" name="password_confirmation" placeholder="Insira novamente sua senha">
                        @error('password_confirmation')
                            <span class="erro">{{$message}}</span>
                        @enderror
                        <button type="submit" class="btn">Salvar</button>

                    </form>
                    
                </div>
            </div>
        </div>
    </section>
    <script>
         document.addEventListener('DOMContentLoaded', function () {
            const nameInput = document.getElementById('full_name');

            nameInput.addEventListener('input', function (event) {
                let input = event.target.value;
                input = input.toLowerCase(); // Converte todo o texto para minúsculas
                input = input.replace(/\b\w/g, function (char) {
                    return char.toUpperCase();
                }); // Converte a primeira letra de cada palavra para maiúscula

                event.target.value = input;
            });
        });


        document.addEventListener('DOMContentLoaded', function () {
            const phoneInput = document.getElementById('phone_number');

            phoneInput.addEventListener('input', function (event) {
                let input = event.target.value;
                input = input.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
                input = input.substring(0, 10); // Limita o número de caracteres a 10
                let formattedInput = '';

                if (input.length > 0) {
                    formattedInput = '(' + input.substring(0, 2);
                }
                if (input.length >= 3) {
                    formattedInput += ') ' + input.substring(2, 6);
                }
                if (input.length >= 7) {
                    formattedInput += '-' + input.substring(6, 10);
                }

                event.target.value = formattedInput;
            });
        });
    </script>
</body>
</html>