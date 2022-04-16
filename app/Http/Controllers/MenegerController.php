<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meneger;

class MenegerController extends Controller
{
    
    public function index(Request $request)
    {
        if (request()->input('search') != null) {
            $search =  Meneger::where('name',  'Like', '%' . request()->input('search') . '%' )
            ->get();
            return view('menegers.index',compact('search'))->with('i');
        } else if (request()->input('id') != null) {
            $search =  Meneger::orderBy("id", "DESC")->get();
            return view('menegers.index',compact('search'))->with('i');
        } else if (request()->input('name') != null) {
            $search =  Meneger::orderBy("name", "DESC")->get();
            return view('menegers.index',compact('search'))->with('i');
        } else if (request()->input('update') != null) {
            $search =  Meneger::orderBy("updated_at", "DESC")->get();
            return view('menegers.index',compact('search'))->with('i');
        } else if (request()->input('refresh') != null) {
            return redirect()->route('members.index');
        } else {
            $search = []; 
            $menegers = Meneger::paginate(10);
            return view('menegers.index',compact('menegers', 'search'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        }
    }
     
    public function create()
    {
        return view('menegers.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        Meneger::create($request->all());
     
        return redirect()->route('menegers.index')
                        ->with('success','Meneger created successfully.');
    }
    
    public function show(Meneger $meneger)
    {
        return view('menegers.show',compact('meneger'));
    } 
     
    public function edit(Meneger $meneger)
    {
        return view('menegers.edit',compact('meneger'));
    }
    
    public function update(Request $request, Meneger $meneger)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $meneger->update($request->all());
    
        return redirect()->route('menegers.index')
                        ->with('success','Meneger updated successfully');
    }
    
    public function destroy(Meneger $meneger)
    {
        $meneger->delete();
    
        return redirect()->route('menegers.index')
                        ->with('success','Meneger deleted successfully');
    }
}
