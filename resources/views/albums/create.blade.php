@extends('layouts.backend', ['title' => $title])
@section('content')
    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="card">
        <div class="card-header">{{ $title }}</div>
        <div class="card-body">
            <form action="{{ route('albums.create') }}" method="post">
                @csrf
                @include('albums.partials.form-control')
                
            </form>
        </div>
    </div>
@endsection