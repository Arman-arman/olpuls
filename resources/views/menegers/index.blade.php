@extends('menegers.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Menegers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('home') }}">Home</a>
                <a class="btn btn-primary" href="{{ url('clients') }}">Clients</a>
                <a class="btn btn-primary" href="{{ route('menegers.create') }}"> Create New Meneger</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="col-md-10">
        <table class="table table-bordered">
            <tr>
                <td class="text-center">
                    <form action="{{ route('menegers.index') }}" method="GET" role="id">
                        @csrf
                        <input type="hidden" name="id" value="id">
                        <button type="submit" class="btn btn-danger">Order By Id</button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="{{ route('menegers.index') }}" method="GET" role="name">
                        @csrf
                        <input type="hidden" name="name" value="name">
                        <button type="submit" class="btn btn-danger">Order By Name</button>
                    </form>
                </td>
                
                <td class="text-center">
                    <form action="{{ route('menegers.index') }}" method="GET" role="update">
                        @csrf
                        <input type="hidden" name="update" value="update">
                        <button type="submit" class="btn btn-danger">Order By Update At</button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="{{ route('menegers.index') }}" method="GET" role="refresh">
                        @csrf
                        <input type="hidden" name="refresh" value="refresh">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-2">
        <form action="{{ route('menegers.index') }}" method="GET" role="search">
            @csrf
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search">
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-danger">Search</button>
            </div>
        </form>
    </div>
    <div class="col-md-10">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @if(isset($menegers))     
            @foreach ($menegers as $meneger)
            <tr>
                
                <td>{{ ++$i }}</td>
                <td>{{ $meneger->name }}</td>
                <td>
                    <form action="{{ route('menegers.destroy', $meneger->id) }}" method="POST">
    
                        <a class="btn btn-info" href="{{ route('menegers.show', $meneger->id) }}">Show</a>
        
                        <a class="btn btn-primary" href="{{ route('menegers.edit', $meneger->id) }}">Edit</a>
    
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        @endif
        @if($search)
            @foreach($search as $v)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $v->name }}</td>
                    <td>
                        <form action="{{ route('menegers.destroy',$v->id) }}" method="POST">
        
                            <a class="btn btn-info" href="{{ route('menegers.show',$v->id) }}">Show</a>
            
                            <a class="btn btn-primary" href="{{ route('menegers.edit',$v->id) }}">Edit</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
    @if(isset($menegers))
    <div class="pagination">
        {!! $menegers->links() !!}
    </div>
    @endif
    </div>
@endsection