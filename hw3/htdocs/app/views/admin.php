<html>

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container m-4">
        <div class="row">

            <?php
            $result = (new Inquiry())->select();
            //var_dump($result);
            foreach ($result["result"] as $item) {
            ?>
                <div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>