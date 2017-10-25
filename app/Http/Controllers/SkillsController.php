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
      $folder = 'images/skills';

      $skills = Skills::orderBy('order_number', 'desc')->get();

      if (count($skills) !== $request->skillOrderNumber){
        $counter = 0;

        while ($skills[$counter]->order_number >= $request->skillOrderNumber){
          $skills[$counter]->increment('order_number');
          $counter++;
        }
      }


      $skill = new Skills;

      $skill->name = $request->skillName;
      $skill->experience = $request->skillExperience;
      $skill->order_number = $request->skillOrderNumber;
      $path = $request->file('skillThumbnail')->store($folder);
      $skill->thumbnail = "storage/$path";
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
      echo "megjött";
      $skill = Skills::find($id);

      echo $skill->name;// = $request->editSkillName;
      echo $skill->experience;// = $request->editSkillExperience;

      // IF THE ORDER NUMBER HAS BEEN CHANGED
      if ($skill->order_number != $request->editSkillOrderNumber){
        // old and new order numbers
        echo 'old: '.$old = $skill->order_number;
        echo 'new: '.$new = $request->editSkillOrderNumber;

        // // GET ALL SKILLS ORDER BY ORDER NUMBER IN A DESCENDING ORDER
        $skills = Skills::orderBy('order_number', 'asc')->get();

        if ($old < $new) {
          $start = Skills::where('order_number', $old)->get();
          for ($i = $old+1; $i < $new+1; $i++){
            Skills::where('order_number', $i )->decrement('order_number');
          }
          Skills::where('id', $start->id)->update(['order_number' => $new]);

          // for ($i = $old; $i < $new; $i++){
          //   $skills[$i]->decrement('order_number');
          //   echo $skills[$i]->order_number."\n";
          // //   // $skills[$i]->save();
          // }
          // $skills[$old-1]->order_number = $new;
          // $skills[$old]->save();

        }
        // else {
        //
        //   for ($i = $new; $i < $old; $i++){
        //     $skills[$i]->increment('order_number');
        //     // $skills[$i]->save();
        //   }
        //   $skills[$old]->order_number = $new +1;
        //   // $skills[$old]->save();
        //
        //
        //
        // }

      }
    }


      // $skill = Skills::find($id);
      //
      // if ($request->thumbnailImage != ''){
      //   // the old file should be deleted
      //   $file = substr($skill->thumbnail,8);
      //   Storage::delete($file);
      //
      //   $folder = 'images/skills';
      //   $file = time().$request->thumbnailInfo;
      //   $base64_raw = $request->thumbnailImage;
      //   $base64_content = explode(',',$base64_raw)[1];
      //   $decoded_data = base64_decode($base64_content);
      //   Storage::put($folder.'/'.$file, $decoded_data);
      //
      //   $skill->thumbnail = 'storage/'.$folder.'/'.$file;
      // }
      // $skill->name = $request->name;
      // $skill->experience = $request->experience;
      // $skill->save();
      // return Skills::get();
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skills  $skills
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      echo "alma";
      // $skill = Skills::find($id);
      // $skill->delete();
      // return Skills::get();
    }
}
