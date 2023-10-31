@extends('googleSheet.layout.app')

@section('content')
    <div class="process-button">
        <a href="{{ route('create') }}" data-bs-toggle="tooltip" data-bs-placement="right"
            title="Save google sheet records in your database.">
            <button type="button" class="btn btn-success">Save Records</button>
        </a> &nbsp;

        @include('googleSheet.create-sheet')

    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th> # </th>
                <th> Firstname </th>
                <th> Lastname </th>
                <th> Email </th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->first_name ?? '' }}</td>
                    <td>{{ $user->last_name ?? '' }}</td>
                    <td>{{ $user->email ?? '' }}</td>
                    <td>
                        <a href="#"><button type="button" class="btn btn-primary">Edit</button></a>
                        <a href="{{ route('delete', $user) }}"><button type="button"
                                class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        <span class="form-control" align="center">
                            No Data Available
                        </span>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
