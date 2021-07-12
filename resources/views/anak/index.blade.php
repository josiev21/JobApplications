@extends('layouts.app')

@section('content')

<h2>Anak (jika ada)</h2>
<div class="mt-2">
    <a href=" {{route('anak.create')}} " class="btn btn-primary mb-3">+ Anak</a>
</div>
@foreach($anaks as $e)

<div class="card mb-2" style="background-color:rgba(255, 255, 255, 0.507);">
    <div class="card-body">
        <h4 class="card-title"> {{$e->name}}  </h4>

        <ul>
            <li>{{ $e->gender}}</li>
            <li>{{ $e->dob}}</li>
            <li>{{ $e->education}}</li>
        </ul>

    <a  class="btn btn-sm btn-primary" href=" {{route('anak.edit', $e)}} " role="button">Edit</a>

        <form action="{{route('anak.destroy', $e)}}" method="POST" style="display: inline">
        @csrf
        @method('DELETE')

        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
        </form>

    </div>
</div>


@endforeach


<div class="text-right">
    <a class=" btn btn-primary mt-3" href=" {{route('skill.index')}} " role="button">Next</a>
</div>


@endsection
