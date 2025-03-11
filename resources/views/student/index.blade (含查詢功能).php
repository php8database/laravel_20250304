<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Student List</h2>
        <p>
            <a href="{{ route('students.create') }}" class="btn btn-success">Add Student</a>
        </p>

        <!-- 搜尋表單 -->
        <form method="GET" action="{{ route('students.index') }}">
            <div class="mb-3">
                <label for="search" class="form-label">Search Students</label>
                <input type="text" class="form-control" id="search" name="search" value="{{ $search ?? '' }}" placeholder="Search by name or mobile">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- 查詢結果 -->
        @if($search)
            <p class="mt-3">Showing results for: "{{ $search }}"</p>
            <a href="{{ route('students.index') }}" class="btn btn-secondary mt-2">Back to Home</a>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="10%">NAME</th>
                    <th width="20%">MOBILE</th>
                    <th>OPT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->mobile }}</td>
                        <td>
                            <form action="{{ route('students.destroy', ['student' => $value->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{ route('students.edit', ['student' => $value->id]) }}" class="btn btn-warning">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
