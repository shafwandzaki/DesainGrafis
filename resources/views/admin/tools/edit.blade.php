@extends('layout.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Tools</h1>
    <form method="POST" action="{{ route('admin.tools.update', $tool) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.tools.form')
    </form>
@endsection