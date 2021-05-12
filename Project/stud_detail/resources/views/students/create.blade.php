@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ URL::asset('css/create.css') }}">
@endpush

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Please check your input code<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.store') }}" method="POST">
    @csrf
     <div class="full">
          <div class="row">
              <strong>Student's Name</strong>
              <input type="text" name="stud_name" class="" placeholder="Student's Name">
          </div>
          <div class="row">
              <strong>Father's Name</strong>
              <input type="text" name="father_name" class="" placeholder="Father's Name">
          </div>
          <div class="row">
              <strong>School's Name</strong>
              <input type="text" name="school" class="" placeholder="School's Name">
          </div>
          <div class="row">
              <strong>Roll No.</strong>
              <input type="text" name="roll_no" class="" placeholder="Roll No.">
          </div>
          <div class="row">
              <strong>Class</strong>
              <input type="text" name="class" class="" placeholder="Class">
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="add btn btn-primary">Add</button>
      </div>

</form>

<br/>

@include('students.index')

@endsection
