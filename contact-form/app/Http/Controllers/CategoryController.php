<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Contact;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('form.form', compact('categories'));
    }
    public function confirm(CategoryRequest $request)
    {
        $validated = $request->validated();

        $category = Category::find($validated['category_id']);
        $validated['inquiry_type'] = $category->content;

        $genderMap = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        $validated['gender_label'] = $genderMap[$validated['gender']];

        return view('form.confirm', ['data' => $validated]);
    }
    public function send(Request $request)
    {
        Contact::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $request->tel_1 . $request->tel_2 . $request->tel_3,
            'address' => $request->address,
            'building' => $request->building,
            'category_id' => $request->category_id,
            'detail' => $request->detail,
        ]);
        return view('form.thanks');
    }
    public function back(Request $request)
    {
        return redirect()->route('form')->withInput();
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
