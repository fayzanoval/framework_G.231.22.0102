<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku - FTIK</title>
    <link rel="stylesheet" href="{{ url('style.css')}}">
</head>
<body>
    <h2 class="judul">Edit Buku</h2>
    <br>
    <form action="{{url('buku/save')}}"method="get">
    @csrf 
        <input type="hidden" name="id" value="{{$query->ID_Buku}}"/>
        <input type="hidden" name="is_update"value="{{$is_update}}"/>
        Judul : <input type="text" name="Judul" value="{{$query->Judul}}"size='50'maxlength='150'/>
        <br/><br/>
        Pengarang : <input type="text" name="Pengarang" value="{{$query->Pengarang}}"size='50'maxlength='150'/>
        <br/><br/>
        Kategori : <select name="Kategori">
            @foreach ($optkategori as $key => $value)
                @if ($query->Kategori == $key)
                <option value="{{$key}}"selected>{{$value}}</option>
                @else
                <option value="{{$key}}">{{$value}}</option>
                @endif
            @endforeach
        </select>
        <br/><br/><input type="submit"name="btn_simpan"value="Simpan"/>
    </form>
    <br/><a href="{{ url('buku') }}">kembali</a>
</body>
</html>