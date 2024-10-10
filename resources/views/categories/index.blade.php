@extends('master')
@section('title', 'Categories')
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3">
                            <h3 class="card-title py-2">Categories List</h3>
                        </div>
                        <div class="col-md-2 offset-7">
                            <a href="{{ route('categories.create') }}" class="btn btn-block btn-outline-primary">Create</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-bordered text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <form method="post" id="delete-form" action="{{ route('categories.destroy', $category->id) }}">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary"><i class="fas fa-pen"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="SingleDelete btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr style="width: 100%">No Records Found!</tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix ">
                    {{ $categories->links('pagination.links') }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
