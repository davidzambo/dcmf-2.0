<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function store(Request $request)
    {
      $folder = 'images/portfolio';

      $p = new Portfolio;

      $p->name = $request->portfolioName;
      $p->link = $request->portfolioLink;
      $p->short_description = $request->portfolioShortDescription;
      $p->long_description = $request->portfolioLongDescription;
      $path = $request->file('portfolioThumbnail')->store($folder);
      $p->thumbnail = "storage/$path";
      $p->save();

      $portfolios = Portfolio::get();
      return view('home.portfolio', compact('portfolios'));
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
      $p = Portfolio::find($request->editPortfolioId);

      if (!empty($request->editPortfolioThumbnail)){
        Storage::delete(str_after($p->thumbnail, 'storage/'));

        $folder = 'images/portfolio';
        $path = $request->file('editPortfolioThumbnail')->store($folder);
        $p->thumbnail = "storage/$path";
      }

      $p->name = $request->editPortfolioName;
      $p->link = $request->editPortfolioLink;
      $p->short_description = $request->editPortfolioShortDescription;
      $p->long_description = $request->editPortfolioLongDescription;
      $p->save();

      $portfolios = Portfolio::get();
      return view('home.portfolio', compact('portfolios'));
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
        Storage::delete(str_after($p->thumbnail, 'storage/'));
        $p->delete();

        $portfolios = Portfolio::get();
        return view('home.portfolio', compact('portfolios'));
    }
}
