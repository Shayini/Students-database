@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ URL::asset('css/create.css') }}">
@endpush

@section('content')




    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update',$stud->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="full">
              <div class="row">
                  <strong>Student's Name</strong>
                  <input type="text" name="stud_name" value="{{ $stud->stud_name }}" placeholder="Student's Name">
              </div>
            <div class="row">
                  <strong>Father's Name</strong>
                  <input type="text" name="father_name" value="{{ $stud->father_name }}" placeholder="Father's Name">
              </div>
              <div class="row">
                  <strong>School's Name</strong>
                  <input type="text" name="school" value="{{ $stud->school }}" placeholder="School's Name">
              </div>
              <div class="row">
                  <strong>Roll No.</strong>
                  <input type="text" name="roll_no" value="{{ $stud->roll_no }}" placeholder="Roll No.">
              </div>
              <div class="row">
                  <strong>Class</strong>
                  <input type="text" name="class" value="{{ $stud->class }}" placeholder="Class">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="update btn btn-primary">Update</button>
          </div>

    </form>

    <br/>

    @include('students.index')

@endsection
