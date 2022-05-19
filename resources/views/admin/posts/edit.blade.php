@extends('layouts.app')

@section('pageTitle', 'Edit Post')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('admin.posts.update', $post->slug) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
                        @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Url - Insert a valid URL. Ex: https://picsum.photos/id/1//400/300</label>
                        <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $post->image) }}">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" rows="3" name="content">{{ old('content', $post->content) }}</textarea>
                        @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
