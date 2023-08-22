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
    <div class="container-fluid p-4">
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
        </div>
        <!-- 投稿内容 -->
        <?php
        require_once './orm/orm.php';
        $pdo = new MyPDO();
        $result = $pdo->findByHashTag($_GET['q']);
        //var_dump($result);
        foreach ($result['result'] as $item) {
        ?>

            <div class="row mb-2">

                <div class="col-4" style="border:solid 1px #ccc;">名前：<?= htmlspecialchars($item['post_name']) ?? '' ?></div>
                <div class="col-8" style="border:solid 1px #ccc;border-left:none;">タグ：<?= htmlspecialchars($item['tag_names']) ?? '' ?> </div>
                <div class="col-12" style="border:solid 1px #ccc;border-top:none;">
                    <div class="w-100"><?= htmlspecialchars($item['post_body']) ?? '' ?></div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>