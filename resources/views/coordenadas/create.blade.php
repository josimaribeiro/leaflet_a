<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Coordenada</title>
</head>
<body>
    <h1>Cadastrar Coordenada</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('coordenadas.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label>Latitude:</label>
        <input type="text" name="latitude" required><br><br>

        <label>Longitude:</label>
        <input type="text" name="longitude" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <br>
    <a href="{{ route('coordenadas.index') }}">Voltar para lista</a>
</body>
</html>
