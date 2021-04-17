@extends('layouts.master')

@section('title') Student Results @endsection

@section('content')

<div class="pt-3 pb-3">
    <h3>
        Student Results
        <a class="btn btn-success ms-3 float-end" href="{{ route('admin.result.create') }}">Add New</a>
    </h3>
    <hr>

    @include('layouts.default-message')

    <div class="table-responsive">
        <table class="table mb-0">

            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Group Name</th>
                    <th>Subject Name</th>
                    <th>Marks</th>
                    <th>Grade</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                    <td>{{ ($results->currentpage()-1) * $results->perpage() + $loop->index + 1 }}</td>
                    <td>{{ $result->student_name }}</td>
                    <td>{{ $result->group_name }}</td>
                    <td>{{ $result->subject_name }}</td>
                    <td>{{ $result->marks }}</td>
                    <td>{{ $result->grade }}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.result.edit', $result) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {!! $results->links() !!}
        </div>
    </div>
</div>

@endsection