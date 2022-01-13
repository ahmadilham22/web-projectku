<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penduduk;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class PendudukController extends Controller
{
    public function index()
    {   
        $peoples = Penduduk::all();
        return view('dashboard.penduduk.index', compact('peoples'));
    }

    public function create()
    {
        $peoples = new Penduduk;
        return view('dashboard.penduduk.create', compact( 'peoples'));
    }

    public function store(Request $request)
    {
        $peoples = new Penduduk;

        $request->validate([
            'nik' => 'unique:penduduks,nik'
        ]);
        
        $peoples->name = $request->name;
        $peoples->nik = $request->nik;
        $peoples->age = $request->age;
        $peoples->date_of_birth = $request->date_of_birth;
        $peoples->address = $request->address;

        $peoples->save();

        return redirect('dashboard/penduduk')->with('success', 'Added data successfull!');
    }

    public function edit($id)
    {
        $id = decrypt($id);
        
        $people = Penduduk::findOrfail($id); 
        return view('dashboard.penduduk.edit', compact('people')); 
    }

    public function update(Request $request)
    {
        // $rules = $request->validate([
        // 'name' => ['required', 'max:255'],
        // 'NIK' => ['required', 'max:255', 'unique:penduduks'],
        // 'age' => ['required', 'max:255'],
        // 'date_of_birth' => ['required', 'max:255'],
        // 'address' => ['required', 'max:255'],
        // ]);

        // Penduduk::find('id', $people->id)->update($rules);
        // dd($rules);

        

        // if ($request->email != $people->email){
        //     $rules['email'] = ['required', 'email:dns', 'unique:users'];
        // } else if ($request->username != $peoples->username){
        //     $rules['username'] = ['required', 'min:3', 'max:255', 'unique:users'];
        // }

        // $validateData['name'] = $rules['name'];
        
        // $request->validate([
        //     'title' => 'required|unique:posts|max:150',
        //     'body' => 'required', 
        // ]);
        
        // $post = Post::find($id)->update($request->all()); 

        // dd($validateData);
        $id = $request->iduser;
        $id = decrypt($id);

        $peoples = Penduduk::findOrfail($id);
        $peoples->name = $request->name;
        $peoples->nik = $request->nik;
        $peoples->age = $request->age;
        $peoples->date_of_birth = $request->date_of_birth;
        $peoples->address = $request->address;

        $peoples->save();

        
        // dd($peoples);

        return redirect('dashboard/penduduk')->with('success', 'Edit data successfull!');

    }

    public function destroy($id)
    {
        $id = decrypt($id); 
        Penduduk::findOrfail($id)->delete();
       
        
       
        return redirect('/dashboard/penduduk')->with('success', 'Data has been deleted!');
    }
}