@extends('clients.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Client</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
        </div>
    </div>
</div>
   
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Menegers:</strong>
                    <select class="form-control" name="meneger_id">
                        <option selected value="">Default select</option>
                        @foreach($menegers as $meneger)
                        <option value="{{$meneger->id}}"
                        {{ old('meneger_id') == $meneger->id ? 'selected' : '' }}
                        >{{$meneger->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection