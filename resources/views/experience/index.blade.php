@extends('layouts.app')

@section('content')

<h2>Pengalaman Kerja</h2>
<div class="mt-2">
    <a href=" {{route('experience.create')}} " class="btn btn-primary mb-3">+ Pengalaman Kerja</a>
</div>
@foreach($experiences as $e)

<div class="card mb-2" style="background-color:rgba(255, 255, 255, 0.788);">
    <div class="card-body">
        <h4 class="card-title"> {{$e->position}}  ({{$e->from}} sampai {{$e->to}}) </h4>

        <ul>
            <li>Nama Perusahaan: {{ $e->company_name}}</li>
            <li>Gaji Pokok: {{ $e->salary}}</li>
            <li>Alasan Keluar: {{ $e->reason}}</li>
            <li>Deskripsi Pekerjaan: {{$e->description}}</li>
        </ul>

    <a  class="btn btn-sm btn-primary" href=" {{route('experience.edit', $e)}} " role="button">Edit</a>

        <form action="{{route('experience.destroy', $e)}}" method="POST" style="display: inline">
        @csrf
        @method('DELETE')

        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
        </form>

    </div>
</div>


@endforeach


<div class="row mt-3">
    <div class="col text-left">
        <a class="btn btn-secondary" href=" {{route('education.index')}} " role="button">Back</a>
    </div>

    <div class="col text-right">
        <a class=" btn btn-primary" href=" {{route('skill.index')}} " role="button">Next</a>
    </div>
</div>
@endsection
