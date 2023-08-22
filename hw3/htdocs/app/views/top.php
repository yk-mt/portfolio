<html>

<head>
    <meta name=”viewport” content=”width=device-width,initial-scale=1″>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fulid m-4">
        <div class="row">

            <div class="col-12 py-2 text-center">
                <h1>お問い合わせ</h1>
            </div>
            <div class="col-12 pt-4 py-4" style="background:#ffffbb;">
                <form action="/post" method="POST" enctype="multipart/form-data">
                    <p>名前<sapn style="color:red;font-size:8pt">＊必須</sapn>
                    <p><input type="text" class="form-control" name="name" placeholder="" required/></p>
                    <p>メール<sapn style="color:red;font-size:8pt">＊必須</sapn>
                    <p><input type="email" class="form-control" name="email" placeholder="" required /></p>
                    <p>問い合わせ区分（あてはまるものがありましたら、チェックを入れてください。複数選択可）</p>
                    <div class="w-100 px-4">
                        <p><label><input type="checkbox" name="inquiry_type[]" value="AAAAに関する問い合わせ"> AAAAに関する問い合わせ</label></p>
                        <p><label><input type="checkbox" name="inquiry_type[]" value="BBBBに関する問い合わせ"> BBBBに関する問い合わせ</label></p>
                        <p><label><input type="checkbox" name="inquiry_type[]" value="CCCCに関する問い合わせ"> CCCCに関する問い合わせ</label></p>
                        <p><label><input type="checkbox" name="inquiry_type[]" value="DDDDに関する問い合わせ"> DDDDに関する問い合わせ</label></p>
                    </div>
                    <p>本文<sapn style="color:red;font-size:8pt">＊必須</sapn>
                    </p>
                    <textarea class="w-100 form-control" name="body" placeholder="" required></textarea>
                    <p class="my-4"><input type="file" name="file"></p>
                    <p style="text-align:right;margin-top:8px;"><button class="btn btn-outline-secondary">送信</button></p>
                </form>
            </div>

        </div>
    </div>
</body>

</html>