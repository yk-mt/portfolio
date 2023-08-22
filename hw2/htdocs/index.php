<html>

<head>
    <style>
        p {
            margin: 0 !important;
        }
    </style>
    <meta name=”viewport” content=”width=device-width,initial-scale=1″>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid px-4 pt-4">
        <div class="row mb-2">

            <div class="col-12 py-2 text-center">
                <h1>掲示板</h1>
            </div>
            <div class="col-12 text-center p-4">
                <form action="./search.php" class="input-group mb-3">
                    <input type="text" class="form-control" name="q">
                    <button class="btn btn-outline-secondary">ハッシュタグから検索</button>
                </form>
            </div>
            <div class="col-12 pt-4 py-4" style="background:#ffffbb;">
                <form action="./post.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="名前" />
                        <input type="text" class="form-control" name="hashtags" placeholder="ハッシュタグ（スペース区切り）" />
                    </div>
                    <textarea name="body" class="form-control" placeholder="本文" required></textarea>
                    <p style="text-align:right;" class="pt-2"><button class="btn btn-primary">投稿</button></p>
                </form>
            </div>
        </div>
        <!-- 投稿内容 -->
        <?php
        require_once "./orm/orm.php";
        $pdo = new MyPDO();
        $result = $pdo->find();
        //var_dump($result);
        foreach ($result["result"] as $item) :
        ?>
            <div class="row mb-2">
                <div class="col-lg-4 col-md-4 col-12" style="background-color:#eee;">名前：<?= htmlspecialchars($item['post_name']) ?? '' ?></div>
                <div class="col-lg-8 col-md-8 col-12" style="background-color:#eee;">タグ：<?= htmlspecialchars($item['tag_names']) ?? '' ?> </div>
                <div class="col-12" style="background-color:#eee;">
                    <div class="w-100"><?= htmlspecialchars($item['post_body']) ?? '' ?></div>
                </div>
            </div>
        <?php
        endforeach
        ?>
    </div>
</body>

</html>