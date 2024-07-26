@extends('layout.sidenav-layout')
@section('content')
    @include('components.due.due-list')
    {{-- @include('components.category.category-delete')
    @include('components.category.category-create')--}}
    @include('components.due.due-edit') 
@endsection
