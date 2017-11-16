<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->input('s');
        $profiles = profile::orderBy('id','DESC')
                                                ->search($s)
                                                ->paginate(10);
        return view('Profiles.index',compact('profiles','s'))
                                                        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'phone' => 'required',
          'email' => 'required|email',
          'address' => 'required'
        ]);

        // dd($request->all());
        profile::create($request->all());
        return redirect()->route('profile.index')
                                                ->with('success' ,'Profile created succesfully.');
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profiles = profile::find($id);
        // return redirect()->route('profile.show',compact('profiles'));
        return view('profiles.show',compact('profiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profiles = profile::find($id);
        return view('profiles.edit',compact('profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request ,[
          'name' => 'required',
          'phone' => 'required',
          'email' => 'required|email',
          'address' => 'required'
        ]);

        profile::find($id)->update($request->all());
        return redirect()->route('profile.index')
                                                  ->with('success','Profiles updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // profile::find($id)->delete();
        profile::destroy($id);
        return redirect()->route('profile.index')
                                                ->with('success','Profile deleted successfully.');
    }
}
