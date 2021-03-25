@extends('layouts.backend')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Genres</th>
                <th>Action</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($bands as $band)
                    <tr>
                        <td>{{ $bands->count() * ($bands->currentPage() - 1) + $loop->iteration }}</td>
                        <td>{{ $band->name }}</td>
                        <td>{{ $band->genres()->get()->implode('name', ', ') }}</td>
                        <td>
                            <a href="{{  route('bands.edit', $band) }}" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
    </table>
   {{ $bands->links() }}
@endsection