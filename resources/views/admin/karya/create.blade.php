@extends('layout.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Karya</h1>
    <form action="{{ route('admin.karya.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.karya.form')
    </form>
@endsection