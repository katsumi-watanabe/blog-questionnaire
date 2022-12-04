<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // アンケート内容は、配列でデータベースに保存する
    protected $casts = [
       'questionnaire_1' => 'array',
       'questionnaire_2' => 'array',
       'questionnaire_3' => 'array',
       'questionnaire_4' => 'array',
       'questionnaire_5' => 'array'
   ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getQRepeatAttribute()
    {
        $blocks = collect();
        // 各アンケートを[collect]に入れる
        for ($i=1; $i <= 5; $i++) {
            $questionnaire = "questionnaire_".$i;
            // [type]と[title]が空ではない場合はcollectに代入する
            if (!empty($this->$questionnaire['q_type']) && !empty($this->$questionnaire['q_title'])) {
                ${'questionnaire_'.$i} =  $this->$questionnaire;
                $blocks = $blocks->merge([${'questionnaire_'.$i}]);
            }
        }
        return collect($blocks);
    }
}
