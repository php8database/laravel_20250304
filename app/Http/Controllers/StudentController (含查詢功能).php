<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 獲取搜尋關鍵字
        $search = $request->input('search'); 

        if ($search) {
            // 搜尋學生名稱或手機
            $data = Student::where('name', 'like', '%' . $search . '%')
                           ->orWhere('mobile', 'like', '%' . $search . '%')
                           ->get();
        } else {
            // 如果沒有搜尋條件，顯示所有學生
            $data = Student::all();
        }

        return view('student.index', ['data' => $data, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 驗證輸入的資料，確保名稱和手機不為空
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
        ]);

        // 若驗證成功，存儲新資料
        $data = new Student;
        $data->name = $validated['name'];
        $data->mobile = $validated['mobile'];
        $data->save();

        return redirect()->route('students.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Student::where('id', $id)->first();
        return view('student.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->except('_token', '_method');
        $data = Student::where('id', $id)->first();
        $data->name = $input['name'];
        $data->mobile = $input['mobile'];
        $data->save();

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Student::where('id', $id)->first();
        $data->delete();
        return redirect()->route('students.index');
    }

    public function excel()
    {
        dd('hello student controller excel');
    }

    public function sayHello()
    {
        dd('hello kai');
    }
}