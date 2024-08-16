<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingTopic extends Model
{
    use HasFactory;

    protected $table = 'training_topics';

    protected $fillable = [
        'title',
        'description',
        'id_division',
        'image',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class, 'id_division');
    }
}
