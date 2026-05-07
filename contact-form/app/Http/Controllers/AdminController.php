<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::with('category');

        // キーワード検索
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('last_name', 'like', "%{$keyword}%")
                    ->orWhere('first_name', 'like', "%{$keyword}%")
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        }

        // 性別フィルター
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // お問い合わせの種類フィルター
        if ($request->filled('inquiry_type')) {
            $query->where('category_id', $request->inquiry_type);
        }

        // 日付フィルター
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        //  $queryを使ってページネーション
        $contacts = $query->paginate(7)->appends($request->query());
        $categories = Category::all();

        return view('admin.admin', compact('contacts', 'categories'));
    }

    public function destroy(string $id)
    {
        Contact::find($id)->delete();
        return redirect()->route('admin.admin');
    }
}