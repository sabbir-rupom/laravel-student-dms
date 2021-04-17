<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Group list page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {

        $groups = Group::select('id', 'name')->orderBy("name")->paginate(5);

        return view('admin.group.index', [
            'groups' => $groups,
        ]);
    }

    /**
     * Group create form page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('admin.group.create');
    }

    /**
     * Create new group
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|unique:groups,name',
        ]);

        Group::create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Group added successfully');
    }

    /**
     * Group edit form page
     *
     * @param Group $group
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Group $group)
    {
        if (empty($group)) {
            return back()->with('status', 'Group not found');
        }

        return view('admin.group.edit', [
            'group' => $group,
        ]);
    }

    /**
     * Update a group
     *
     * @param Request $request
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Group $group)
    {
        if (empty($group)) {
            return back()->with('status', 'Group not found');
        }

        $this->validate($request, [
            'name' => 'required|string|unique:groups,name',
        ]);

        $group->update([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Group updated successfully');
    }

    /**
     * Delete a group
     *
     * @param Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Group $group)
    {
        if (empty($group)) {
            return back()->with('status', 'Group not found');
        }

        $group->delete();

        return back()->with('success', 'Group has been deleted');
    }
}
