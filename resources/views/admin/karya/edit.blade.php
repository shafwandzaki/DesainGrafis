@extends('layout.admin')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Edit Karya</h1>
    @include('admin.partials.alert')
    @include('admin.karya.form', ['item' => $karya, 'action' => route('admin.karya.update', $karya)])
</div>
@endsection