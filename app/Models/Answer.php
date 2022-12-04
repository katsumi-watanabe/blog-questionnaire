<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['article_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function getAnswerArrayAttribute()
    {
        for ($i=1; $i <= 5; $i++) {
            $answer = "answer_$i";
            if (!empty($this->$answer)) {
                $answer_array[] = explode(",",$this->$answer);
            }
        }
        return $answer_array;
    }
}
