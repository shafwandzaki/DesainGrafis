@extends('layout.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Desain</h1>
    <form action="{{ route('admin.desain.update', $desain) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.desain.form')
    </form>
@endsection