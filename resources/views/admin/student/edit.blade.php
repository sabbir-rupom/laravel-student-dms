@extends('layouts.master')

@section('title') Student Edit @endsection

@section('content')

@include('layouts.default-message')

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4 text-center">Edit Form</h4>
        <form action="{{ route('admin.student.edit', $student) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3 row">
                <label for="input--fullname" class="col-md-2 offset-md-2 col-form-label text-end">
                    Full Name <sup class="text-danger">*</sup>
                </label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="fullname" id="input--name"
                        value="{{ $student->fullname }}" placeholder="type student name" required autocomplete="off"
                        minlength="3" maxlength="100">

                    @error('fullname')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="input--roll" class="col-md-2 offset-md-2 col-form-label text-end">
                    Roll <sup class="text-danger">*</sup>
                </label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="roll" id="input--tag" value="{{ $student->roll }}"
                        placeholder="enter tag" required autocomplete="off" maxlength="10">

                    @error('roll')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="input--propic" class="col-sm-2 offset-md-2 col-form-label text-end">
                    Profile Image
                </label>
                <div class="col-sm-3">
                    <input class="form-control" type="file" id="input--propic" name="propic"
                        accept="image/x-png,image/jpeg,image/png">

                </div>
                <div class="col-sm-3">
                    @if (!empty($student->propic))
                    <img class="img-fluid" src="{{ url("/storage/{$student->propic}") }}" />
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-lg mt-3">Update</button>
            </div>

        </form>
    </div>
</div>

@endsection