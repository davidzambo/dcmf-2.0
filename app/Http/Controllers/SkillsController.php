<?php

namespace App\Http\Controllers;

use App\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'skills';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $skill = new Skills;
      $skill->name = $request->name;
      $skill->experience = $request->experience;
      $skill->order_number = $request->ordernumber;
      $skill->save();

      return Skills::get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function show(Skills $skills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function edit(Skills $skills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $skill = Skills::find($id);
      $skill->name = $request->name;
      $skill->experience = $request->experience;
      $skill->order_number = $request->ordernumber;
      $skill->save();

      return Skills::get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      echo "hi";
      $skill = Skills::find($id);
      $skill->delete();
      return Skills::get();
    }
}
