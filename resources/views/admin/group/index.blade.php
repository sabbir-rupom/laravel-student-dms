@extends('layouts.master')

@section('title') Group List @endsection

@section('content')

<div class="pt-3 pb-3">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>
                Group List
                <a class="btn btn-success ms-3 float-end" href="{{ route('admin.group.create') }}">Create New</a>
            </h3>
            <hr>
        
            @include('layouts.default-message')
            <div class="table-responsive">
                <table class="table mb-0">
        
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                        <tr>
                            <td>{{ ($groups->currentpage()-1) * $groups->perpage() + $loop->index + 1 }}</td>
                            <td>{{ $group->name }}</td>
                            <td class="text-center">
                                <form id="delete--{{ $group->id }}" action="{{ route('admin.group.delete', $group) }}"
                                    method="POST">
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.group.edit', $group) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger btn-confirm"
                                        title="remove this item" data-id="{{ $group->id }}"
                                        data-message="Do you wish to delete group {{ $group->name }} ?">
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
                    {!! $groups->links() !!}
                </div>
            </div>
        </div>
    </div>

    
</div>

@endsection