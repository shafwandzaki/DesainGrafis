@extends('layout.admin')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Tambah Tools</h1>
    @include('admin.partials.alert')
    @include('admin.tools.form', ['item' => null, 'action' => route('admin.tools.store')])
</div>
@endsection