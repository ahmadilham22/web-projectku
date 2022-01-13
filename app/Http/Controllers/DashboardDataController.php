<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class DashboardDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Data::all(); // Mengambil semua data yang ada di model DATA
        return view('dashboard.data.index', compact('datas')); // mengembalikan ke halaman awal dashboard dengan compact yang berfungsi untuk mempassing data
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $datas = new Data; // Membuat data baru ke model Data
        return view('dashboard.data.create', compact(
            'datas'
        )); // Menampilkan view create data kemudian melemparkan variabel datas yang berfungsi menampung data yang akan di buat
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $validateData = $request->validate([
        'name' => ['required', 'max:255'],
        'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        'email' => ['required', 'email:dns', 'unique:users'],
        'password' => ['required', 'min:5', 'max:255']
        ]); // validasi data apa saja yang nantinya akan di buat
        

        $validateData['password'] = Hash::make($validateData['password']); // validasi password dimana password akan dienkripsi
        

        User::create($validateData); // membuat data baru dengan parameter dari validate data dimana pada baris sebelumnya telah divalidasi

        
        // $request->session()->flash('success', 'Registration Successfull!, Please Login');

        return redirect('dashboard/data')->with('success', 'Added data successfull!'); // setelah berhasil membuat data makan akan di redirect ke menu menampilkan data
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = decrypt($id);

        
        $data = Data::findOrfail($id); 
        return view('dashboard.data.edit')->with(compact('data')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        // $decrypted = Crypt::decryptString($request->id);
        
        
        
        $rules = $request->validate([
        'name' => ['required', 'max:255'],
        'password' => ['required', 'min:5', 'max:255']
        ]);

        if ($request->email != $data->email){
            $rules['email'] = ['required', 'email:dns', 'unique:users'];
        } else if ($request->username != $data->username){
            $rules['username'] = ['required', 'min:3', 'max:255', 'unique:users'];
        }

        $validateData['name'] = $rules['name'];
        $validateData['password'] = Hash::make($rules['password']);
        

        Data::where('id', $data->id)
        -> update($validateData);
        // dd($validateData);
        
        
        
        // $request->session()->flash('success', 'Registration Successfull!, Please Login');

        return redirect('dashboard/data')->with('success', 'Update data successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $id = decrypt($id); 
        $data = Data::findOrfail($id)->delete();
       
        
       
        return redirect('/dashboard/data')->with('success', 'Data has been deleted!');
    }
}