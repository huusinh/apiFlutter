@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
@foreach ($lstLoai as $loai)
<a href ="{{route('loaiSanPham.show',['loaiSanPham'=>$loai])}}">{{$loai->ten_loai_san_pham}}</a>
    
@endforeach
@endsection