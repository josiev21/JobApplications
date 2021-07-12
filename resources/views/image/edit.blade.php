@extends('layouts.app')

@section('content')
<div class="card mb-2" style="background-color:rgba(255, 255, 255, 0.507);">
    <div class="card-body">
<div class="container">
    <h2>Edit Work Detail</h2>

    <form action="{{route('image.update', $image)}}" method='POST'>
        @csrf
        @method('PUT')

    <input type="file" name='image' placeholder='Job Title' value="{{$image->image}}">

      

        <input type="submit" value="Save">

    </form>

</div>

    </div>
</div>
@endsection
