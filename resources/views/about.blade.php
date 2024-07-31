@extends('layouts.main') <!-- Ni akan beritahu halaman ini mengambil/layout dari main.blade.php -->
 
@section('container')
    <h1>{{ $name }}</h1>
    <p>{{ $email }}</p>
    <img src="{{ $img }}" alt="Profile Image">
@endsection

