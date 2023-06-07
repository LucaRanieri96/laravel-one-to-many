@extends("layouts.admin")

@section("content")

@if($errors->any())

@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
  <strong>{{$error}}</strong>
</div>
@endforeach

@endif

<form action="{{ route('admin.projects.store') }}" method="post">
  @csrf

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Project name">

    @error('name')
    <small class="text-danger">Please, fill the field correctly</small>
    @enderror
    
  </div>

  <div class="mb-3">
    <label for="type_id" class="form-label">Types</label>
    <select class="form-select" name="type_id" id="type_id">
      <option value="">Select a type</option>
      @foreach ($types as $type)
      <option value="{{ $type->id }}" {{ $type->id == old('type_id', '') ? 'selected' : ''}}>{{ $type->name }}</option>
      @endforeach
    </select>

  </div>

  <button type="submit" class="btn btn-primary">Insert project</button>
  <button type="reset" class="btn btn-danger">Reset fields</button>
</form>

@endsection
