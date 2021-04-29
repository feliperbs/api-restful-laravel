<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        return $client->toJson();
    }

    public function list()
    {
        $client = Client::all(['id']);
        return $client->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        try{
            $request->validated();
            $client = new Client();
            $client->email = $request->email;
            $client->name = $request->name;
            $client->phone = $request->phone;
            $client->date_of_birth = $request->date_of_birth;
            $client->zip_code = $request->zip_code;
            $client->address = $request->address;
            $client->complement = $request->complement;
            $client->neighborhood = $request->neighborhood;
            $client->save();
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $client = Client::find($id);
            if($client){
                return $client->toJson();
            }
            return response("Client não encontrado com o id $id");
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        try{
            $request->validated();
            $client = Client::find($id);
            $client->email = $request->email;
            $client->name = $request->name;
            $client->phone = $request->phone;
            $client->date_of_birth = $request->date_of_birth;
            $client->zip_code = $request->zip_code;
            $client->address = $request->address;
            $client->complement = $request->complement;
            $client->neighborhood = $request->neighborhood;
            $client->save();
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
    }
}
