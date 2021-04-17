@extends('layouts.master')

@section('title') New Result @endsection

@section('content')


@include('layouts.default-message')

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4 text-center">Result Create Form</h4>
        <form action="{{ route('admin.result.create') }}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="input--group_id" class="col-md-2 offset-md-1 col-form-label text-end">
                    Select Group <sup class="text-danger">*</sup>
                </label>
                <div class="col-md-3">
                    <select class="form-select ajax-select" id="input--group_id"
                        data-url="{{ url('/ajax/group/subject/') }}" data-target="#input--subject_id">
                        <option selected>Please Select</option>
                        @if ($groups)
                        @foreach ($groups as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <label for="input--subject_id" class="col-md-2 col-form-label text-end">
                    Select Subject <sup class="text-danger">*</sup>
                </label>
                <div class="col-md-3">
                    <select class="form-select ajax-select" name="subject_id" id="input--subject_id" required>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="input--group_id" class="col-md-2 offset-md-1 col-form-label text-end">
                    Select Student <sup class="text-danger">*</sup>
                </label>
                <div class="col-md-3">
                    <select class="form-select" id="input--student_id" name="student_id">
                        <option selected>Please Select</option>
                        @if ($students)
                        @foreach ($students as $data)
                        <option value="{{ $data->id }}">[ Roll - {{ $data->roll }} ] {{ $data->fullname }}</option>
                        @endforeach
                        @endif
                    </select>

                    @error('student_id')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <label for="input--marks" class="col-md-2 col-form-label text-end">
                    Marks <sup class="text-danger">*</sup>
                </label>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="marks" id="input--marks" placeholder="enter marks"
                        required value="{{ old('marks', '') }}">

                    @error('marks')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-lg mt-3">Add Result</button>
            </div>

        </form>
    </div>
</div>

@endsection