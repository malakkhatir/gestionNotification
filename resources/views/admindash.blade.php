@extends('layouts.app')

@php
use Illuminate\Support\Facades\Auth;
@endphp

@section('content')
<div class="container">
    
    <h1>Bienvenue sur votre tableau de bord, {{ Auth::user()->name }}!</h1>
    <p>Vous êtes connecté en tant qu'administrateur.</p>
</div>
@endsection