@extends('layout.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Tambah Tools</h1>
    <form method="POST" action="{{ route('admin.tools.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.tools.form')
    </form>
@endsection