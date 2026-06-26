@extends('home.home')
@section('content')
    <div class="flex flex-col gap-2 p-2">
        @include('admin.desh.room')
        @include('admin.desh.gallery')
    </div>
@endsection