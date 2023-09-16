<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Operations with Relationship</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h2>Laravel 9 CRUD Operations with Relationship</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="pull-right mb-2">
                            <a class="btn btn-success" href="{{ route('students.create') }}"> Create Student</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="pull-right mb-2 float-right">
                            <a class="btn btn-success" href="{{ route('subjects.create') }}"> Create Subject</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <br />
        <br />
        <br />
        <br />
        <br />
        <div class="container">
            <div class="title">
                <h2>Display all subjects per student on click on Students' name</h2>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Address</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td class="showSubjects" id="student-{{ $student->id }}" data-id="{{$student->id}}">{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->address }}</td>
                        <td>
                            <form action="{{ route('students.destroy',$student->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td id="subjects-{{ $student->id }}" data-id="{{$student->id}}" style="display: none;">
                            @foreach ($student->subjects as $subject)
                            {{ $subject->name }}
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $students->links() !!}
            </div>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <div class="container">
            <div class="title">
                <h2>Display all students per subject on click on Subjects' name</h2>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject Name</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td class="showStudents" id="subject-{{ $subject->id }}" data-id="{{$subject->id}}">{{ $subject->name }}</td>

                        <td>
                            <form action="{{ route('subjects.destroy',$subject->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('subjects.edit',$subject->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <tr id="students-{{ $subject->id }}" data-id="{{$subject->id}}" style="display: none;">
                        @foreach ($subject->students as $student)
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->address }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $students->links() !!}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".showSubjects").click(function() {
                var id = $(this).attr("data-id");
                console.log(id);
                $("#subjects-" + id).slideToggle();
                $("#student-thead").slideToggle();
            });
            $(".showStudents").click(function() {
                var id = $(this).attr("data-id");
                console.log(id);
                $("#students-" + id).fadeToggle();
                $("#subject-thead").fadeToggle();
            });
            $("td.showSubjects").mouseover(function() {
                $(this).css({
                    cursor: 'pointer'
                });
            });
            $("td.showStudents").mouseover(function() {
                $(this).css({
                    cursor: 'pointer'
                });
            });
        });
    </script>
</body>

</html>