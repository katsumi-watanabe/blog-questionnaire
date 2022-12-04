<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Answer;

class ArticleController extends Controller
{
    // 投稿記事作成画面
    public function index()
    {
        return view('article.index');
    }

    // 投稿記事詳細画面
    public function detail($detail)
    {
        $article = Article::find($detail);

        return view('article.detail', compact('article'));
    }

    // 投稿記事作成処理
    public function create(Request $request)
    {
        $article = new Article;
        $article->article_title = $request->article_title;
        $article->article_detail = $request->article_detail;

        for ($i=1; $i <= 5; $i++) {
        ${'questionnaire_'.$i} = array();
        ${'questionnaire_'.$i} = array(
            "q_type" => $request->input("q{$i}"),
            "q_title" => $request->input("q_title_{$i}"),
            "q_select" => $request->input("q_select_{$i}")
        );

            $questionnaire = "questionnaire_".$i;
            ${'questionnaire_'.$i}["q_select"] = explode(",", ${'questionnaire_'.$i}["q_select"]);
            $article->$questionnaire = ${'questionnaire_'.$i};
            !$request->input("q_title") ?: "questionnaire_".$i = $questionnaire;
        }

        $article->save();

        return redirect()->route('article.detail', ['detail' => $article->id])->with('flash_message', '投稿が完了しました。');
    }

    // アンケートの回答を保存する処理
    public function answer(Request $request, $article)
    {
        $answer = new Answer;

        for ($i=1; $i <= 5; $i++) {
            $answer_num = "answer_".$i;
            $request->$answer_num ? $answer_num = implode(",", $request->$answer_num) : $answer_num = null;
            $answer_str = "answer_".$i;
            $answer->$answer_str = $answer_num;
        }
        $answer->article_id = $article;
        $answer->save();

        return redirect()->route('article.detail', ['detail' => $article])->with('flash_message', 'アンケートを回答しました');
    }
}
