<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryStatus extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'task_status_id', 'task_id'];


    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'task_status_id');
    }

    public function taskHistory()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
    public function historyStatus()
    {
        return $this->belongsTo(TaskStatus::class, 'task_status_id','id');
    }
}
