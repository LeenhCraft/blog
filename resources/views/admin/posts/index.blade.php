@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-sm btn-secondary float-right" href="{{ route('admin.posts.create') }}">Nuevo Post</a>
    <h1>Listado de Post</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop
