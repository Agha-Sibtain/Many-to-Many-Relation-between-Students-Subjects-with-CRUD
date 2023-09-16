<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Operations with Relationship</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h2>Laravel 9 CRUD Operations with Relationship</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('subjects.create') }}"> Create Subject</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Subject Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subject as $subjects)
                    <tr>
                        <td>{{ $subjects->id }}</td>
                        <td>{{ $subjects->name }}</td>
                        <td>
                            <form action="{{ route('subjects.destroy',$subjects->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('subjects.edit',$subjects->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $subject->links() !!}
    </div>
</body>
</html>