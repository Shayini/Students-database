

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Student's Name</th>
            <th>Father's Name</th>
            <th>School's Name</th>
            <th>Roll#</th>
            <th>Class</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->stud_name }}</td>
            <td>{{ $student->father_name }}</td>
            <td>{{ $student->school }}</td>
            <td>{{ $student->roll_no }}</td>
            <td>{{ $student->class }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Update</a>
            </td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $students->links() !!}
