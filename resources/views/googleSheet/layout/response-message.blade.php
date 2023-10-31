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
