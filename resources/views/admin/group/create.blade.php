@extends('layouts.master')

@section('title') Create Group @endsection

@section('content')


@include('layouts.default-message')

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-4 text-center">Group Create Form</h4>
        <form action="{{ route('admin.group.create') }}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="input--name" class="col-md-2 offset-md-2 col-form-label text-end">
                    Name <sup class="text-danger">*</sup>
                </label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="name" id="input--name"
                        value="{{ old('name', '') }}" placeholder="type group name" required >

                    @error('name')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-lg mt-3">Create</button>
            </div>

        </form>
    </div>
</div>

@endsection