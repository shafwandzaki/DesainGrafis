@extends('layout.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Karya</h1>
    <form action="{{ route('admin.karya.update', $karya) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.karya.form')
    </form>
@endsection