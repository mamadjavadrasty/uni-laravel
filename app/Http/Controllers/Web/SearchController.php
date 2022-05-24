<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\SearchRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.search');
    }

    public function search(SearchRequest $request)
    {
        $inputs = $request->all();

        $q = Student::query();

        if ($inputs['first_name']){
            $q->where('first_name','LIKE','%' .$inputs['first_name'] . '%');
        }
        if ($inputs['last_name']){
            $q->where('last_name','LIKE','%' .$inputs['last_name'] . '%');
        }
        if ($inputs['city']){
            $q->where('city','LIKE','%' .$inputs['city'] . '%');
        }
        if ($inputs['national_code']){
            $q->where('national_code',$inputs['national_code']);
        }
        if ($inputs['vaccine']){
            if ($inputs['vaccine'] != '*'){
                $q->where('vaccine',$inputs['vaccine']);
            }
        }
        if (isset($inputs['request_dormitory'])){
            $q->where('request_dormitory',1);
        }

        $students = $q->limit($inputs['limit'])->orderByDesc('created_at')->get();

        return response()->json(['students'=>$students]);
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
        //
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
    public function destroy($id)
    {
        //
    }
}
