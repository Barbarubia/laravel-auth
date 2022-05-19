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
        <div class="row bg-dark text-white">
            <div class="col-1 d-flex align-items-center border py-1">
                <h5 class="my-0">#id</h5>
            </div>
            <div class="col-3 d-flex align-items-center border py-1">
                <h5 class="my-0">Title</h5>
            </div>
            <div class="col-3 d-flex align-items-center border py-1">
                <h5 class="my-0">Slug</h5>
            </div>
            <div class="col-1 d-flex align-items-center border py-1">
                <h5 class="my-0">Created at</h5>
            </div>
            <div class="col-1 d-flex align-items-center border py-1">
                <h5 class="my-0">Updated at</h5>
            </div>
            <div class="col-3 d-flex align-items-center border py-1">
                <h5 class="my-0">Options</h5>
            </div>
        </div>

        @foreach ($posts as $post)
            <div class="row bg-secondary">
                <div class="col-1 d-flex align-items-center border py-1">
                    <p class="my-0">{{ $post->id }}</p>
                </div>
                <div class="col-3 d-flex align-items-center border py-1">
                    <p class="my-0">{{ $post->title }}</p>
                </div>
                <div class="col-3 d-flex align-items-center border py-1">
                    <p class="my-0">{{ $post->slug }}</p>
                </div>
                <div class="col-1 d-flex align-items-center border py-1">
                    <p class="my-0">{{ date('d/m/Y', strtotime($post->created_at)) }}</p>
                </div>
                <div class="col-1 d-flex align-items-center border py-1">
                    <p class="my-0">{{ date('d/m/Y', strtotime($post->updated_at)) }}</p>
                </div>
                <div class="col-3 d-flex flex-wrap justify-content-between align-items-center border py-1">
                    <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}"><i class="fa-solid fa-eye"></i> View</a>
                    <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->slug) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <button class="btn btn-danger btn-delete" data-id="{{ $post->id }}"><i class="fa-solid fa-trash-can"></i> Delete</button>
                </div>
            </div>
        @endforeach

        <div class="row mt-3">
            <div class="col d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>

    </div>

@endsection
