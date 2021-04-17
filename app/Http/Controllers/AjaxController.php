<?php

namespace App\Http\Controllers;

use App\Models\Subject;

class AjaxController extends Controller
{
    public function getSubjectsByGroup(int $groupId)
    {
        $subjects = Subject::select('id', 'name as text')->where('group_id', $groupId)->get()->toArray();

        return response()->json([
            'success' => true,
            'message' => "Data fetched successfully",
            'data' => $subjects,
        ]);
    }
}
