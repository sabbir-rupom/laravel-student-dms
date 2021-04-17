<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id',
        'name',
    ];

    public static function getGroupSubjects()
    {
        return self::select('groups.name as group_name', 'subjects.id', 'subjects.name as subject_name')
            ->leftJoin('groups', 'groups.id', '=', 'subjects.group_id')
            ->orderBy('groups.name')->orderBy('subjects.name')
            ->paginate(5);
    }
}
