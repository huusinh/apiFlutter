@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<h1>{{$loai->ten_loai_san_pham}}</h1>
@foreach ($lstSanPham as $sp)
<a href ="{{route('sanPham.show',['sanPham'=>$sp])}}">{{$sp->ten_san_pham}}</a><br />
    
@endforeach
@endsection