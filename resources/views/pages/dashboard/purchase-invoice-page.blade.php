@extends('layout.sidenav-layout')

@section('content')
    @include('components.purchase-invoice.purchase-invoice-list')
    @include('components.purchase-invoice.purchase-invoice-details')
    @include('components.purchase-invoice.purchase-invoice-delete')
@endsection