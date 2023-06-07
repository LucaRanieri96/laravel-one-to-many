@extends('layouts.admin')

@section('content')

@if(session("message"))
<div class="alert alert-success" role="alert">
  <strong>{{ session("message") }}</strong>
</div>
@endif

<div class="card overflow-hidden">
    <div class="card-header bg-primary text-light">
        <h2 class="mb-0">Projects resume</h2>
    </div>
    <div class="card-body bg-dark text-light">
        <h4>Project name:
          <br>
          <span class="fw-normal">{{$project->name}}</span>
        </h4>
        <hr>
        <h4>Repository URL:
          <br>
          <span class="fw-normal">{{$project->repoUrl}}</span>
        </h4>
        <hr>
        <h4>Project starting date:
          <br>
          <span class="fw-normal">{{$project->startingDate}}</span>
        </h4>
    </div>
</div>
@endsection
