@extends('layout.admin')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Tambah Desain</h1>
    @include('admin.partials.alert')
    @include('admin.desain.form', ['item' => null, 'action' => route('admin.desain.store')])
</div>
@endsection