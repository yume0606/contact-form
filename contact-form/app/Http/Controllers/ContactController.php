<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\CategoryRequest;

class ContactController extends Controller
{
    public function send(CategoryRequest $request)
    {
        $genderMap = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];
        Contact::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $request->phone1 . $request->phone2 . $request->phone3,
            'address' => $request->address,
            'building' => $request->building,
            'category_id' => $request->category_id,
            'detail' => $request->detail,
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
