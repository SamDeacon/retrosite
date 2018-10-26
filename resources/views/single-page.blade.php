@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
            <div class="card-header">{{ $page->title }}</div>

                <div class="card-body">

                    {!! $page->body !!}
                   <img src="/{{ $page->image }}" alt="" style="max-width: 100%">
                </div>
            </div>
    </div>
</div>
@endsection