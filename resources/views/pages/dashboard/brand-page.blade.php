@extends('layout.sidenav-layout')

@section('content')
    @include('components.brand.brand-create')
    @include('components.brand.brand-list')
    @include('components.brand.brand-update')
    @include('components.brand.brand-delete')
    
@endsection