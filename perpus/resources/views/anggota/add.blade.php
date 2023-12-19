<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota - FTIK</title>
    <link rel="stylesheet" href="{{ url('style.css')}}">
</head>
<body>
    <h2 class="judul">Tambah Anggota</h2>
    <br>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $errors)
            <li>{{ $errors }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{url('anggota/save')}}" method="get">
    @csrf 
        <input type="hidden" name="id" value=""/>
        <input type="hidden" name="is_update" value="{{$is_update}}"/>
        NIM : <input type="text" name="NIM" value="{{old('NIM')}}" size="50" maxlength="100"/>
        <br/><br/>Nama : <input type="text" name="Nama" value="{{old('Nama')}}" size="50" maxlength="150"/>
        <br/><br/>Progdi : 
        <select type="text" name="Progdi">
            @foreach ($optprogdi as $key => $value)
            @if (old('Progdi')==$key)
                <option value="{{$key}}"selected>{{$value}}</option>
                @else
                <option value="{{$key}}">{{ $value }}</option>
                @endif
            @endforeach
        </select>
        <br/><br/><input type="submit" name="btn_simpan" value="Simpan"/>
    </form>
    <br/><a href="{{ url('anggota') }}">kembali</a>
</body>
</html>