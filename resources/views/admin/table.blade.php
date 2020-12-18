@extends('layouts.admin')

@section('content')

<form class="mb-5" action="{{ route('admin.blogs.store') }}" method="POST">
    @csrf

    <div class="mb-3 col-4">
        <label for="title" class="form-label">Enter title</label>
        <input type="text" class="form-control" name="title" aria-describedby="title">
    </div>
    <div class="mb-3 col-4">
        <label for="slug" class="form-label">Enter slug</label>
        <input type="text" class="form-control" name="slug" aria-describedby="slug">
    </div>
    <div class="mb-3 col-4">
        <label for="text" class="form-label">Enter text</label>
        <textarea type="text" class="form-control" name="text" aria-describedby="text"></textarea>
    </div>
    <div class="col-4">
        <button class="btn btn-primary">Save</button>
    </div>
</form>

<table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Text</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
            <tr>
                <th>{{ $blog->id }}</th>
                <th>{{ $blog->title }}</th>
                <th>{{ $blog->slug }}</th>
                <th>{{ $blog->text }}</th>
                <td>

                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                    
                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" />

                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    {{-- <button id="custom" class="btn btn-danger" type="button" data-id="{{ $blog->id }}">Delete 1222</button> --}}

                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection

{{-- 
<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>
<script>

$('#custom').click(function (e) {
    alert(123)
    let id = $(this).data('id');
    let $this = this;

    $.ajax({
        url:"{{ route('admin.blogs.delete') }}",
        type:"POST",
        data: {
            _token: '{{ csrf_token() }}',
            id: id,
        }
    }).done(function(data){
        if (data) {
            $($this).parent().parent().remove();
            // $().html(data);
        }

    });
});
</script> --}}