@extends('dashboard.layouts.main')

@section('container')
    <div class="py-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Welcome, {{ auth()->user()->name }}</h1>
        <!-- Divider Line -->
        <hr class="border-gray-300 mb-4">
    </div>
@endsection
