@extends('layout.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Desain</h1>
    <form action="{{ route('admin.desain.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.desain.form')
    </form>
@endsection