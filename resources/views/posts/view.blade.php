@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-9">
                <h1>{{ $post->title}} </h1>
                <div> {!! $post->content !!} </div>
            </div>
        </div>
    </div>
</div>
@endsection
