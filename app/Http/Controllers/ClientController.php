<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Meneger;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        
        if (request()->input('search') != null) {
            $search =  Client::with('meneger')->where('name',  'Like', '%' . request()->input('search') . '%' )
            ->latest()->get();
            return view('clients.index',compact('search'))->with('i');
        } else if (request()->input('id') != null) {
            $search =  Client::with('meneger')
            ->orderBy("id", "DESC")->get();
            return view('clients.index',compact('search'))->with('i');
        } else if (request()->input('name') != null) {
            $search =  Client::with('meneger')
            ->orderBy("name", "DESC")->get();
            return view('clients.index',compact('search'))->with('i');
        } else if (request()->input('member') != null) {
            $search =  Client::with('meneger')
            ->orderBy("member", "DESC")->get();
            return view('clients.index',compact('search'))->with('i');
        } else if (request()->input('update') != null) {
            $search =  Client::with('meneger')
            ->orderBy("updated_at", "DESC")->get();
            return view('clients.index',compact('search'))->with('i');
        } else if (request()->input('refresh') != null) {
            
            return redirect()->route('clients.index');
        }
        else {
            $search = []; 
            $clients = Client::with('meneger')->paginate(10);
            return view('clients.index',compact('clients', 'search'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        }
        
    }
     
    public function create()
    {
        $menegers = Meneger::get();
        return view('clients.create', compact('menegers'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        Client::create($request->all());
     
        return redirect()->route('clients.index')
                         ->with('success','Client created successfully.');
    }
    
    public function show(Client $client)
    {
        $client->with('meneger')->first();
        return view('clients.show',compact('client'));
    } 
     
    public function edit(Client $client)
    {
        $menegers = Meneger::get();
        return view('clients.edit', compact('client', 'menegers'));
    }
    
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $client->update($request->all());
    
        return redirect()->route('clients.index')
                         ->with('success','Client updated successfully');
    }
    
    public function destroy(Client $client)
    {
        $client->delete();
    
        return redirect()->route('clients.index')
                         ->with('success','Client deleted successfully');
    }
}
