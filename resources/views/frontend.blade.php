@extends('layouts.app')
@section('content')
    <h1 style="text-align: center">Hallo {{ Auth::user()->name }} , Selamat Datang di Dashboard Frontend</h1>
@endsection