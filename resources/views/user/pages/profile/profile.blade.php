@extends('user.pages.dashboard-user.index')

@section('title', 'Profile Saya')

@section('konten-ds')
{{-- MEMANGGIL KONTEN PROFILE NYA --}}
    @include('profile._content')
@endsection
