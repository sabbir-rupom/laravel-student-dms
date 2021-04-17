@extends('layouts.master')

@section('title') Group Edit @endsection

@section('content')

@include('layouts.default-message')

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4 text-center">Edit Form</h4>
        <form action="{{ route('admin.group.edit', $group) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3 row">
                <label for="input--name" class="col-md-2 offset-md-2 col-form-label text-end">
                    Name <sup class="text-danger">*</sup>
                </label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="name" id="input--name"
                        value="{{ $group->name }}" placeholder="type student name" required >

                    @error('name')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-lg mt-3">Update</button>
            </div>

        </form>
    </div>
</div>

@endsection