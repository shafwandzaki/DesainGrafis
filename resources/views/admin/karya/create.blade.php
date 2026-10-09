@extends('layout.admin')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Tambah Karya</h1>
    @include('admin.partials.alert')
    @include('admin.karya.form', ['item' => null, 'action' => route('admin.karya.store')])
</div>
@endsection