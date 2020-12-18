@extends('layouts.admin')

@section('content')


<form class="mb-5" action="{{ route('admin.blogs.update', $data->id) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT" />
    <div class="mb-3 col-4">
        <label for="title" class="form-label">Enter title</label>
        <input type="text" class="form-control" name="title" value="{{ $data->title }}" aria-describedby="title">
    </div>
    <div class="mb-3 col-4">
        <label for="slug" class="form-label">Enter slug</label>
        <input type="text" class="form-control" name="slug" value="{{ $data->slug }}" aria-describedby="slug">
    </div>
    <div class="mb-3 col-4">
        <label for="text" class="form-label">Enter text</label>
        <textarea type="text" class="form-control" name="text" aria-describedby="text">
            {{ $data->text }}
        </textarea>
    </div>
    <div class="col-4">
        <button class="btn btn-primary">Save</button>
    </div>
</form>
@endsection