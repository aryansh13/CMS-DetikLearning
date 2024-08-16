<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = 'divisions';

    public function trainingTopics()
    {
        return $this->hasMany(TrainingTopic::class, 'id_division');
    }
}
