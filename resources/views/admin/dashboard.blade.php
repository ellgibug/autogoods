@extends('admin.layouts.master-s')

@section('content')
    <h1>Dashboard</h1>
    <h2>Welcome, {{ Auth::guard('admin')->user()->name }}</h2>
    @component('components.who')
    @endcomponent
@endsection