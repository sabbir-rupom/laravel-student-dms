@extends('layouts.master')

@section('title') Student List @endsection

@section('content')

<div class="pt-3 pb-3">
    <h3>
        Student List
        <a class="btn btn-success ms-3 float-end" href="{{ route('admin.student.create') }}">Create New</a>
    </h3>
    <hr>

    @include('layouts.default-message')

    <div class="table-responsive">
        <table class="table mb-0">

            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Roll</th>
                    <th>Profile Photo</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ ($students->currentpage()-1) * $students->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $student->fullname }}</td>
                    <td>{{ $student->roll }}</td>
                    <td>
                        @if (!empty($student->propic))
                        <a href="{{ url('storage/' . $student->propic) }}" target="_blank">
                            <img class="img-thumbnail img-fluid img-table"
                                src="{{ url('storage/' . $student->propic)  }}" />
                        </a>
                        @endif
                    </td>
                    <td class="text-center">
                        <form id="delete--{{ $student->id }}" action="{{ route('admin.student.delete', $student) }}"
                            method="POST">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.student.edit', $student) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger btn-confirm"
                                title="remove this item" data-id="{{ $student->id }}"
                                data-message="Do you wish to delete student {{ $student->fullname }} ?">
                                <i class="fas fa-minus"></i>
                            </button>
                            {{ csrf_field() }} @method('delete')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {!! $students->links() !!}
        </div>
    </div>
</div>

@endsection