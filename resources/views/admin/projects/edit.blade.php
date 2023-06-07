@extends("layouts.admin")

@section("content")

@if($errors->any())

@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
  <strong>{{$error}}</strong>
</div>
@endforeach

@endif

<form action="{{ route('admin.projects.update', $project->id) }}" method="post">

  @csrf
  @method("PUT")

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $project->name)}}">
    <small id="titleHelper" class="text-muted">Type the new name</small>

    @error('name')
    <small class="text-danger">Please, fill the field correctly</small>
    @enderror
    
  </div>

  <div class="mb-3">
    <label for="type_id" class="form-label">Types</label>
    <select class="form-select" name="type_id" id="type_id">
      <option value="">Select a type</option>
      @foreach ($types as $type)
      <option value="{{ $type->id }}" {{ $type->id == old('type_id', $project->type->id) ? 'selected' : ''}}>{{ $type->name }}</option>
      @endforeach
    </select>

  </div>
  
  <button type="submit" class="btn btn-primary">Edit project</button>
  <button type="reset" class="btn btn-danger">Reset fields</button>
</form>

@endsection