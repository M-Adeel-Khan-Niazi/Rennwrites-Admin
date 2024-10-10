@extends('master')
@section('title', isset($category) ? 'Edit Category': 'Create Category')
@section('main-content')
    <div class="card card-primary">
        <!-- form start -->
        @if(isset($category))
            <form method="POST" action="{{ route('categories.update', $category->id) }}">
                @method('PUT')
        @else
            <form method="POST" action="{{ route('categories.store') }}">
        @endif
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{ old('title', isset($category) ? $category->title : '') }}" type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter Title">
                            @error('title')
                                <span id="title" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input value="{{ old('slug', isset($category) ? $category->slug : '') }}" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Enter Slug">
                            @error('slug')
                            <span id="slug" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
