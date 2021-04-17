<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Result extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'subject_id',
        'marks',
        'grade',
    ];

    /**
     * Get all result list of students
     *
     * @return void
     */
    public static function getAllResults()
    {
        return self::select('students.fullname as student_name',
            'groups.name as group_name', 'subjects.name as subject_name',
            'marks', 'grade', 'results.id')
            ->leftJoin('students', 'students.id', '=', 'results.student_id')
            ->leftJoin('subjects', 'subjects.id', '=', 'results.subject_id')
            ->leftJoin('groups', 'groups.id', '=', 'subjects.group_id')
            ->paginate(5);
    }

    /**
     * Store / Update student result
     *
     * @param Request $request
     * @return void
     */
    public static function saveResult(Request $request, Result $result = null)
    {
        $grade = Grade::where('from', '<=', $request->marks)->where('to', '>=', $request->marks)->first();
        if (empty($grade)) {
            return [
                'success' => false,
                'message' => 'Grade not found from provided marks',
            ];
        }

        if ($result) {
            // Perform update operation
            $result->update([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'marks' => $request->marks,
                'grade' => $grade->grade,
            ]);

            return [
                'success' => true,
                'message' => 'Result updated successfully',
            ];
        } else {
            // check if already exists or not
            if (self::where([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
            ])->exists()) {
                return [
                    'success' => false,
                    'message' => 'Result already exists for this student subject',
                ];
            }

            // store new result information
            self::create([
                'student_id' => $request->student_id,
                'subject_id' => $request->subject_id,
                'marks' => $request->marks,
                'grade' => $grade->grade,
            ]);

            return [
                'success' => true,
                'message' => 'Result added successfully',
            ];
        }

    }
}
