@extends('layouts.backend', ['title' => $title])

@section('content')

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="card">
        <div class="card-header">Albums</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Band</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($albums as $album)
                            <tr>
                                <td>{{ $albums->count() * ($albums->currentPage() - 1) + $loop->iteration }}</td>
                                <td>{{ $album->name }}</td>
                                <td>{{ $album->band->name }}</td>
                                <td>
                                    {{-- $album bisa juga $album->slug --}}
                                    <a href="{{ route('albums.edit', $album) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <div endpoint="{{ route('albums.delete', $album) }}" class="delete d-inline"></div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
            {{ $albums->links() }}
        </div>
    </div>
@endsection