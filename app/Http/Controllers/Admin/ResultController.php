<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Subject list page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $studentResults = Result::getAllResults();

        return view('admin.result.index', [
            'results' => $studentResults,
        ]);
    }

    /**
     * Result create form page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $groups = Group::select('id', 'name')->orderBy("name")->get();

        $students = Student::select('id', 'fullname', 'roll')->orderBy("roll")->get();

        return view('admin.result.create', [
            'groups' => $groups,
            'students' => $students,
        ]);
    }

    /**
     * Add new result
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'subject_id' => 'required|integer|exists:subjects,id',
            'student_id' => 'required|integer|exists:students,id',
            'marks' => 'required|integer',
        ]);

        $query = Result::saveResult($request);

        if ($query['success']) {
            return back()->with('success', $query['message']);
        }

        return back()->with('status', $query['message']);
    }

    /**
     * Result edit form page
     *
     * @param Result $result
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Result $result)
    {
        if (empty($result)) {
            return back()->with('status', 'Result not found');
        }

        $subjectInfo = Subject::where('id', $result->subject_id)->first();

        $groupId = $subjectInfo->group_id;

        $subjects = Subject::select('id', 'name')->where('group_id', $groupId)->orderBy("name")->get();

        $groups = Group::select('id', 'name')->orderBy("name")->get();

        $students = Student::select('id', 'fullname', 'roll')->orderBy("roll")->get();

        return view('admin.result.edit', [
            'groups' => $groups,
            'subjects' => $subjects,
            'students' => $students,
            'groupId' => $groupId,
            'result' => $result,
        ]);
    }

    /**
     * Update specific result
     *
     * @param Request $request
     * @param Result $result
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Result $result)
    {
        if (empty($result)) {
            return back()->with('status', 'Result not found');
        }

        $this->validate($request, [
            'subject_id' => 'required|integer|exists:subjects,id',
            'student_id' => 'required|integer|exists:students,id',
            'marks' => 'required|integer',
        ]);

        $query = Result::saveResult($request, $result);

        if ($query['success']) {
            return back()->with('success', $query['message']);
        }

        return back()->with('status', $query['message']);
    }

    /**
     * Delete a result
     *
     * @param Result $result
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Result $result)
    {
        if (empty($result)) {
            return back()->with('status', 'Result not found');
        }

        $result->delete();

        return back()->with('success', 'Result has been deleted');
    }
}
