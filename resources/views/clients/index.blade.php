@extends('clients.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Clients</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('home') }}">Home</a>
                <a class="btn btn-primary" href="{{ url('menegers') }}">Menegers</a>
                <a class="btn btn-primary" href="{{ route('clients.create') }}">Create New Client</a>
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
                    <form action="{{ route('clients.index') }}" method="GET" role="id">
                        @csrf
                        <input type="hidden" name="id" value="id">
                        <button type="submit" class="btn btn-danger">Order By Id</button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="{{ route('clients.index') }}" method="GET" role="name">
                        @csrf
                        <input type="hidden" name="name" value="name">
                        <button type="submit" class="btn btn-danger">Order By Name</button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="{{ route('clients.index') }}" method="GET" role="members">
                        @csrf
                        <input type="hidden" name="members" value="members">
                        <button type="submit" class="btn btn-danger">Order By Members</button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="{{ route('clients.index') }}" method="GET" role="update">
                        @csrf
                        <input type="hidden" name="update" value="update">
                        <button type="submit" class="btn btn-danger">Order By Update At</button>
                    </form>
                </td>
                <td class="text-center">
                    <form action="{{ route('clients.index') }}" method="GET" role="refresh">
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
        <form action="{{ route('clients.index') }}" method="GET" role="search">
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
                <th>Meneger</th>
                <th width="280px">Action</th>
            </tr>
            @if(isset($clients))
                @foreach ($clients as $client)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->meneger['name'] }}</td>
                    <td>
                        <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
        
                            <a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">Show</a>
            
                            <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Edit</a>
        
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
                        <td>{{ $v->meneger['name'] }}</td>
                        <td>
                            <form action="{{ route('clients.destroy',$v->id) }}" method="POST">
            
                                <a class="btn btn-info" href="{{ route('clients.show',$v->id) }}">Show</a>
                
                                <a class="btn btn-primary" href="{{ route('clients.edit',$v->id) }}">Edit</a>
            
                                @csrf
                                @method('DELETE')
                
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
        @if(isset($clients))
        <div class="pagination">
            {!! $clients->links() !!}
        </div>
        @endif
    </div>
    
    
    
      
@endsection