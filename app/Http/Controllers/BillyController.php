<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BillyController extends Controller
{

    public function __construct() {


        // you can use except and only  to apply the middleware only for a specific methods.
        // https://laravel.com/docs/5.2/controllers#controller-middleware
        $this->middleware('myCustomMiddlewareGroup');
    }

    public function apiUserShowId() {
        return "i am the content for API User Show ID";
    }

    public function apiUserShowId2() {
        // i can call the api inside code
        // https://github.com/dingo/api/wiki/Internal-Requests
        $dispatcher = app('Dingo\Api\Dispatcher');

        echo $dispatcher->version('v1')->get('api/apiUsers/4');
    }

    public function testMiddleware() {
        echo "i am the content for testMiddleware";
    }

    // points to the route that is profile that is grouped by "admin::"
    public function showIndex() {
        echo route('admin::profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
