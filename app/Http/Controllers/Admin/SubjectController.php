<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Result;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Subject list page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $subjects = Subject::getGroupSubjects();

        return view('admin.subject.index', [
            'subjects' => $subjects,
        ]);
    }

    /**
     * Subject create form page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $groups = Group::select('id', 'name')->orderBy("name")->get();

        return view('admin.subject.create', [
            'groups' => $groups,
        ]);
    }

    /**
     * Create new subject
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'group_id' => 'required|integer|exists:groups,id',
            'name' => 'required|min:3',
        ]);

        Subject::create([
            'group_id' => $request->group_id,
            'name' => $request->name,
        ]);

        return back()->with('success', 'Subject added successfully');
    }

    /**
     * Subject edit form page
     *
     * @param Subject $subject
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Subject $subject)
    {
        if (empty($subject)) {
            return back()->with('status', 'Subject not found');
        }

        $groups = Group::select('id', 'name')->orderBy("name")->get();

        return view('admin.subject.edit', [
            'groups' => $groups,
            'subject' => $subject,
        ]);
    }

    /**
     * Update specific subject
     *
     * @param Request $request
     * @param Subject $subject
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Subject $subject)
    {
        if (empty($subject)) {
            return back()->with('status', 'Subject not found');
        }

        $this->validate($request, [
            'group_id' => 'required|integer|exists:groups,id',
            'name' => 'required|min:3',
        ]);

        $subject->update([
            'group_id' => $request->group_id,
            'name' => $request->name,
        ]);

        return back()->with('success', 'Subject updated successfully');
    }

    /**
     * Delete a subject
     *
     * @param CourseSection $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Subject $subject)
    {
        if (empty($subject)) {
            return back()->with('status', 'Subject not found');
        }

        Result::where('subject_id', $subject->id)->delete();

        $subject->delete();

        return back()->with('success', 'Subject has been deleted');
    }
}
