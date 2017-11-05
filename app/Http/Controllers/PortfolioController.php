<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use Storage;
use Validator;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::get();
        return view('home.portfolio', compact('portfolios'));
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
    public function store(Request $request, Portfolio $p)
    {
      $validator = Validator::make($request->all(), [
        'portfolioName' => 'required',
        'portfolioLink' => 'required|url',
        'portfolioShortDescription' => 'required',
        'portfolioLongDescription' => 'required',
        'portfolioThumbnail' => 'required|file|image'
      ]);

      if ($validator->passes()){
        $p->name = $request->portfolioName;
        $p->link = $request->portfolioLink;
        $p->short_description = $request->portfolioShortDescription;
        $p->long_description = $request->portfolioLongDescription;
        $p->thumbnail = $request->file('portfolioThumbnail')->storeAs('images/portfolio', time().'-'.str_slug($p->name));

        $p->save();

        return response()->json([
          'inserted_portfolio_element' => $p,
          'portfolio' => Portfolio::get()
        ]);
      } else {
        // VALIDATOR NOT PASSED
        return response()->json([
          'error' => $validator->errors()->all()
        ]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $p = Portfolio::find($request->portfolioId);

      $validator = Validator::make($request->all(), [
        'portfolioName' => 'required',
        'portfolioLink' => 'required|url',
        'portfolioShortDescription' => 'required',
        'portfolioLongDescription' => 'required',
        'portfolioThumbnail' => 'file|image'
      ]);

      if ($validator->passes()){

        if (!empty($request->file('portfolioThumbnail'))){
          $delete_result = Storage::delete($p->thumbnail);
          $p->thumbnail = $request->file('portfolioThumbnail')->storeAs('images/portfolio', time().'-'.str_slug($p->name));
        }

        $p->name = $request->portfolioName;
        $p->link = $request->portfolioLink;
        $p->short_description = $request->portfolioShortDescription;
        $p->long_description = $request->portfolioLongDescription;
        $p->save();

        return response()->json([
          'edited_portfolio_element' => $p,
          'delete_result' => $delete_result,
          'portfolio' => Portfolio::get()
        ]);
      } else {
        // VALIDATOR NOT PASSED
        return response()->json([
          'error' => $validator->errors()->all(),
        ]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Portfolio::find($id);
        Storage::delete(public_path($p->thumbnail));
        $p->delete();

        return Portfolio::get();
    }
}
