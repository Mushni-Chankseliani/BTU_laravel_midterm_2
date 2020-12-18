@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $data->title }}</h2>
    <h5>{{ $data->slug }}</h5>

    <p>{{ $data->text }}</p>
</div>
@endsection