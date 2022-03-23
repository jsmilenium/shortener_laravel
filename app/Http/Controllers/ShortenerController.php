<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shortener;

class ShortenerController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shortener(Request $request)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-_';
        $result = '';
        for($i = 0; $i < 11; $i++){
            $result .= $characters[mt_rand(0, 63)];
        }

        $data = [
            'url' => $request->url,
            'code' => $result
        ];

        $this->store($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {

        try {
            $shortener = new Shortener();
            $url = $data['url'];
            $find = Shortener::where("url", $url)->count();

            if($find <= 0){
                $shortener->title = '';
                $shortener->url = $url;
                $shortener->code = $data['code'];
                $shortener->counter = 1;
                $shortener->save();
                $this->show($data['code']);
            }else{
                $this->update($data);
            }
        } catch (\Exception $e) {
            echo 'Error: '.$e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($data)
    {
        try {
            $shortener = Shortener::where("url", $data['url'])->first();

            if($shortener){
                $shortener->counter = $shortener->counter+1;
                $shortener->save();
            }
            $this->show($shortener->code);
        } catch (\Exception $e) {
            echo 'Error: '.$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($data)
    {
        echo json_encode($data);
    }

    public function redirect($code){
        try {
            $shortener = Shortener::where("code", $code)->first();

            if($shortener){
                return Redirect::to($shortener->url);
            }else{
                echo "There's no result";
            }

        } catch (\Exception $e) {
            echo 'Error: '.$e->getMessage();
        }
    }

    public function topUrls(){
        try {
            $shortener = Shortener::orderBy('counter', 'desc')->take(100)->get();

            if($shortener){
                echo json_encode($shortener);
            }else{
                echo "There's no result";
            }

        } catch (\Exception $e) {
            echo 'Error: '.$e->getMessage();
        }
    }

}


