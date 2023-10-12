<!DOCTYPE html>
<html lang="en">

<head>
    <title>Google Doc Sheets</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        h2 {
            text-align: center;
        }

        table thead tr th {
            text-align: center;
        }

        table tbody tr td {
            text-align: center;
        }

        .process-button {
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="container mt-3">
        <h2>List of all records from google sheets</h2>

        @php
            $count = 1;
        @endphp
        <!-- error message -->
        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        <strong>{{ $error }}</strong>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- success message -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="process-button">
            <a href="{{ route('create') }}" data-bs-toggle="tooltip" data-bs-placement="right"
                title="Save google sheet records in your database.">
                <button type="button" class="btn btn-success">Save Records</button>
            </a>
            {{-- &nbsp;
            <a href="{{ route('create') }}" data-bs-toggle="tooltip" data-bs-placement="right"
                title="Add a new google sheet.">
                <button type="button" class="btn btn-success">Add Sheet </button>
            </a> --}}
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
    </div>

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>

</html>
