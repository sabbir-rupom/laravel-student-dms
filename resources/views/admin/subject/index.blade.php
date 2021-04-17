@extends('layouts.master')

@section('title') Subject List @endsection

@section('content')

<div class="pt-3 pb-3">
    <h3>
        Subject List
        <a class="btn btn-success ms-3 float-end" href="{{ route('admin.subject.create') }}">Create New</a>
    </h3>
    <hr>

    @include('layouts.default-message')

    <div class="table-responsive">
        <table class="table mb-0">

            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Group Name</th>
                    <th>Subject Name</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ ($subjects->currentpage()-1) * $subjects->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $subject->group_name }}</td>
                    <td>{{ $subject->subject_name }}</td>
                    <td class="text-center">
                        <form id="delete--{{ $subject->id }}" action="{{ route('admin.subject.delete', $subject) }}"
                            method="POST">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.subject.edit', $subject) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger btn-confirm"
                                title="remove this item" data-id="{{ $subject->id }}"
                                data-message="Do you wish to delete subject {{ $subject->subject_name }} ?">
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
            {!! $subjects->links() !!}
        </div>
    </div>
</div>

@endsection