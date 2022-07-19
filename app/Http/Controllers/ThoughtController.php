<?php

namespace App\Http\Controllers;

use App\Models\Thought;
use Illuminate\Http\Request;

class ThoughtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thought = Thought::all();
        return view('thindex', compact('thought'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storedata = $request->validate([
            'mythoughts' => 'required|max: 255',
            'date' => 'required', date('Y-m-d', strtotime($request->date)),
        ]);


        $thought = Thought::create($storedata);
        return redirect('/thoughts')->with('success', 'Thought has been saved');
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
        $thought = Thought::findOrFail($id); //retreive the first result of the query
        return view('thedit', compact('thought'));
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
        $updatedata = $request->validate([
            'mythoughts' => 'required|max: 255',
            'date' => 'required', date('Y-m-d', strtotime($request->date)),
        ]);

        Thought::whereId($id)->update($updatedata);
        return redirect('/thoughts')->with('success', 'Thought has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thought = Thought::findOrFail($id);
        $thought->delete();
        return redirect('/thoughts')->with('success', 'Thought has been deleted');
    }
}
