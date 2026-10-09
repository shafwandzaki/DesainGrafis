@extends('layout.admin')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Edit Desain</h1>
    @include('admin.partials.alert')
    @include('admin.desain.form', ['item' => $desain, 'action' => route('admin.desain.update', $desain)])
</div>
@endsection