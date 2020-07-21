@extends('layouts.app')

@section('content')

<div class="col-md-6 col-lg-6 col-md-offset-3  col-lg-offset-3">
        @include('partials.success')
    <div class="card card-primary ">
    <div class="card-header">projects <a  class="float-right btn btn-primary btn-sm" href="/projects/create">
    <i class="fa fa-plus-square" aria-hidden="true"></i>  Create new</a> </div>
    <div class="card-body">
        

    <ul class="list-group">
    @foreach($projects as $project)
        <li class="list-group-item"> 
        <i class="fa fa-play" aria-hidden="true"></i> <a href="/projects/{{ $project->id }}" >  {{ $project->name }}</a></li>
    @endforeach
    </ul>


    </div>
    </div>
</div>

@endsection