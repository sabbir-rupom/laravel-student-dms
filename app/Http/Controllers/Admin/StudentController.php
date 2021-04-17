<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Student list page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $students = Student::orderBy('id')->paginate(5);

        return view('admin.student.index', [
            'students' => $students,
        ]);
    }

    /**
     * Student add form page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Process and insert new student
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validationRules = [
            'fullname' => 'required|min:4',
            'roll' => 'required|unique:students,roll',
        ];

        if ($request->hasFile('propic')) {
            $validationRules['propic'] = 'required|mimes:jpg,png,jpeg|max:4096';
        }

        $this->validate($request, $validationRules);

        $propic = null;

        if ($request->hasFile('propic')) {
            $file = $request->file('propic');
            $newFileName = 'propic' . Str::random(12) . '.' . $file->extension();

            if ($file->storeAs('public/' . Student::IMAGE_PROFILE, $newFileName)) {
                $propic = Student::IMAGE_PROFILE . DIRECTORY_SEPARATOR . $newFileName;
            }
        }

        Student::create([
            'fullname' => $request->fullname,
            'roll' => $request->roll,
            'propic' => $propic,
        ]);

        return back()->with('success', 'Student added successfully');
    }

    /**
     * Student edit form page
     *
     * @param Student $student
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Student $student)
    {
        if (empty($student)) {
            return back()->with('status', 'Student not found');
        }

        return view('admin.student.edit', [
            'student' => $student,
        ]);
    }

    /**
     * Update a student profile
     *
     * @param Request $request
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Student $student)
    {
        if (empty($student)) {
            return back()->with('status', 'Student not found');
        }

        $validationRules = [
            'fullname' => 'required|min:4',
            'roll' => 'required',
        ];

        if ($request->hasFile('propic')) {
            $validationRules['propic'] = 'required|mimes:jpg,png,jpeg|max:4096';
        }

        $this->validate($request, $validationRules);

        if (Student::where('roll', $request->roll)->where('id', '!=', $student->id)->exists()) {
            return back()->with('status', 'The roll has already been taken');
        }

        $propic = null;

        if ($request->hasFile('propic')) {
            $file = $request->file('propic');
            $newFileName = 'propic' . Str::random(12) . '.' . $file->extension();

            if ($file->storeAs('public/' . Student::IMAGE_PROFILE, $newFileName)) {
                $propic = Student::IMAGE_PROFILE . $newFileName;

                $this->_removeFile($student->propic);
            }
        }

        $student->update([
            'fullname' => $request->fullname,
            'roll' => $request->roll,
            'propic' => $propic,
        ]);

        return back()->with('success', 'Student updated successfully');
    }

    /**
     * Delete a file from public storage
     *
     * @param string $filePath
     * @return void
     */
    private function _removeFile(string $filePath = null)
    {
        if (empty($filePath)) {
            return false;
        }

        $path = storage_path('app/public/' . $filePath);

        if (!File::exists($path)) {
            return false;
        }

        return Storage::disk('public')->delete($filePath);

    }

    /**
     * Delete a student
     *
     * @param Student $student
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Student $student)
    {
        if (empty($student)) {
            return back()->with('status', 'Student not found');
        }

        Result::where('student_id', $student->id)->delete();

        $student->delete();

        return back()->with('success', 'Student has been deleted');
    }
}
