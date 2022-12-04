<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style type="text/css">

form {
    background-color: #fff;
    padding: 20px;
}
</style>
</head>
<body class="bg-dark">
<div class="container">
<div class="main container-fluid">
    <div class="bg-light text-dark py-5">
        <div class="col-md-8 offset-md-2">
            <h2 class="fs-1 mb-5 text-center fw-bold">投稿記事詳細</h2>
            @if (session('flash_message'))
                <div class="comment_bnr comment_submit alert-success">
                    <p>{{ session('flash_message') }}</p>
                </div>
            @endif
            <p>投稿記事</p>
            <hr>
            <p>{{ $article->article_title }}</p>
            <p>{{ $article->article_detail }}</p>

            @if ($article->q_repeat->isNotEmpty())
            <form method="post" action="{{route('article.answer', ['article' => $article])}}">
                @csrf
                <p>アンケートフォーム</p>
                <hr>
                @php
                    $counter = 1;
                @endphp

                @foreach ($article->q_repeat as $questionnaire)
                    <div class="mb-3">
                        <p>{{$questionnaire['q_title']}}</p>
                        @for ($i = 0; $i < count($questionnaire['q_select']); $i++)
                            <label>
                                <input type="{{$questionnaire['q_type']}}" name="answer_{{$counter}}[]" value="{{$questionnaire['q_select'][$i]}}">
                                {{$questionnaire['q_select'][$i]}}
                            </label>
                        @endfor
                    </div>
                    <hr>
                @php
                    $counter ++;
                @endphp
                @endforeach
                <div class="text-center pt-4 col-md-6 offset-md-3">
                    <a href="{{route('index')}}"><button type="button" class="btn btn-success">
                        投稿フォームへ戻る</button></a>
                </div>
                <div class="text-center pt-4 col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
// フラッシュメッセージのfadeout
$(function(){
    setTimeout("$('.comment_submit').fadeOut('slow')", 3000);
});
</script>
</html>