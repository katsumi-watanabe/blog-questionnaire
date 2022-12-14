<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body class="bg-dark">
<div class="container">
<div class="main container-fluid">
    <div class="row bg-light text-dark py-5">
        <div class="col-md-8 offset-md-2">
            <h2 class="fs-1 mb-5 text-center fw-bold">投稿入力フォーム</h2>
            <form method="post" action="{{ route('article.create') }}">
                @csrf
                <p>記事フォーム</p>
                <hr>
                <div class="mb-3">
                    <input type="text" class="form-control" name="article_title" placeholder="記事タイトル" value="" required>
                </div>
                <div class="mb-4">
                    <textarea class="form-control" name="article_detail" rows="5" placeholder="記事内容" required></textarea>
                </div>
                @for ($i = 1; $i < 6; $i++)
                <div class="questionnair-input{{$i}}" @if($i >= 2) style="display: none;"  @endif>
                    <p>アンケート内容記述フォーム{{$i}}</p>
                    <hr>
                    <div class="mb-3">
                        <input style="margin-right: 5px;" type="radio" id="radio{{$i}}" name="q{{$i}}" value="radio"><label style="margin-right: 20px;" for="radio{{$i}}">ラジオボタン</label>
                        <input style="margin-right: 5px;" type="radio" id="checkbox{{$i}}" name="q{{$i}}" value="checkbox"><label style="margin-right: 20px;" for="checkbox{{$i}}">チェックボックス</label>
                        <input style="margin-right: 5px;" type="radio" id="text{{$i}}" name="q{{$i}}" value="text"><label for="text{{$i}}">テキストフォーム</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="q_title_{{$i}}" placeholder="アンケートタイトル" value="">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="q_select_{{$i}}" placeholder="アンケート選択肢" value="">
                    </div>
                    @if ($i < 5)
                    <div class="text-left pb-2 mb-3 col-md-12">
                        <button type="button" class="btn btn-success add-button{{$i}}">追加</button>
                    </div>
                    @endif
                </div>
                @endfor
                <div class="text-center pt-4 col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>
<script>
for (let i = 1; i < 5; i++) {
    document.querySelector('.add-button' + i).onclick = function() {
    var questionnair_from = document.getElementsByClassName('questionnair-input' + (i + 1));
        questionnair_from[0].style.display = "block";
    }
};
</script>
</html>