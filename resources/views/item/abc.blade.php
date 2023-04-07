<!DOCTYPE html>
<html lang="ja">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ようこそ</title>

</head>

<body> 
<h1>ようこそ</h1>
@section('css')
    <style>
        body {font-size:16pt; color:#999; }
        h1 { font-size:50pt; text-align:right; color:#f6f6f6;
              margin:-20px 0px -30px 0px; letter-specing:-4pt; }
    </style>  
@stop    
    <p>{{$msg ?? ''}}</p>
    <p>こんにちは、{{$msg ?? ''}}さん。</p>
    ＠else
    <p>何か書いて下さい。</p>
    ＠endif
    <form method="POST" action="/hello">
        {{ csrf_field() }}
        <input type="text" name="msg">
        <input type="submit">
    </form>  
</body>

</html>