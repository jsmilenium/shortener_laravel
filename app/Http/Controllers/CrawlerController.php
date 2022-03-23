<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crawler;

class CrawlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crawlers = Crawler::orderBy('title')->get();

        return view('crawlers.index', compact('crawlers'));
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

}
