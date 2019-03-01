<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Level;
use Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
      public function __construct()
    {
        $this->title = 'user';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title; 
        $data=User::all();
        
        return view('admin.'.$title.'.index', compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        $data =level::all();
        return view('admin.'.$title.'.create', compact('title','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|confirmed',
            'username' => 'required|string|max:20|unique:users',
            'level' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            ]);
        $model = $request->all();
        $model['password'] = bcrypt($model['password']); 
        if (User::create($model)){
            Alert::success('Data Berhasil Disimpan', 'Selamat');
        }else{
            Alert::error('Data Gagal Disimpan', 'Maaf');
        }
        return Redirect::to('admin/'.$this->title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $title = $this->title;
        $data = user::find($id);
        $level = Level::all();
        return view('admin.'.$title.'.edit', compact('title','data','level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request)
    {
        $model = $request->all();
        $model['password'] = bcrypt($model['password']); 

        $data = User::find($model['id']); 

        if ($data->update($model)){                
            Alert::success('Data Berhasil Diupdate', 'Selamat');
        }else{
            Alert::error('Data Gagal Diupdate', 'Maaf');
        }
        return Redirect::to('admin/'.$this->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        if($data->delete()){
            Alert::success('Data Berhasil Dihapus', 'Selamat');
        }else{
            Alert::error('Data Gagal Dihapus', 'Maaf');
        }
        return Redirect::to('admin/'.$this->title);
    }
}
