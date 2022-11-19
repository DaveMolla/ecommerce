<?php

namespace App\Http\Controllers;
use App\Http\Requests\CatagoryRequest;


use Illuminate\Http\Request;
use App\Catagory;
class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catagory.index')->with('catagories', Catagory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catagory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatagoryRequest $request)
    {
        
        Catagory::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Catagory Added successfully');
       return redirect(route('catagories.index'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catagory $catagory)
    {
        if ($catagory->products->count() > 0) {

            session()->flash('error','Catagory can not be deleted, because it is associated by some points');

        return redirect()->back();
            
        }
        $catagory->delete();
        session()->flash('success', 'Catagory Deleted successfully');
        return redirect(route('catagories.index'));
    }
}
