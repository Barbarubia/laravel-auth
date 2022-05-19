@extends('layouts.app')

@section('pageTitle', 'Admin Control Panel')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Admin Control Panel</h1>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col d-flex justify-content-end">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add a new post</a>
            </div>
        </div>
        <div class="row bg-success">
            <div class="col-1 border-right">
                <h6>#id</h6>
            </div>
            <div class="col-3 border-right">
                <h6>Title</h6>
            </div>
            <div class="col-3 border-right">
                <h6>Slug</h6>
            </div>
            <div class="col-1 border-right">
                <h6>Created at</h6>
            </div>
            <div class="col-1 border-right">
                <h6>Updated at</h6>
            </div>
            <div class="col-3">
                <h6>Options</h6>
            </div>
        </div>

        @foreach ($posts as $post)
            <div class="row bg-info">
                <div class="col-1 border-right">
                    <p>{{ $post->id }}</p>
                </div>
                <div class="col-3 border-right">
                    <p>{{ $post->title }}</p>
                </div>
                <div class="col-3 border-right">
                    <p>{{ $post->slug }}</p>
                </div>
                <div class="col-1 border-right">
                    <p>{{ date('d/m/Y', strtotime($post->created_at)) }}</p>
                </div>
                <div class="col-1 border-right">
                    <p>{{ date('d/m/Y', strtotime($post->updated_at)) }}</p>
                </div>
                <div class="col-3">
                    <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}"><i class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->slug) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button class="btn btn-danger btn-delete" data-id="{{ $post->id }}"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}

    </div>

@endsection
