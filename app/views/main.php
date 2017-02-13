<html>
    <head>

        <meta charset="utf-8">
        <title><?= $data['page_title']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../../css/style.css">
        <script src="../../js/main.js"></script>

    </head>
    <body>
        <div class="container">

            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Mailing System</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="<?= (isset($data['page']) && $data['page'] == "home") ? "active" : ""; ?>"><a href="/home/index/">Users</a></li>
                        <li class="<?= (isset($data['page']) && $data['page'] == "template") ? "active" : ""; ?>"><a href="/home/template/">Templates</a></li>
                        <li class="<?= (isset($data['page']) && $data['page'] == "statistic") ? "active" : ""; ?>"><a href="/state/index/">Statistic</a></li>
                        <li class="<?= (isset($data['page']) && $data['page'] == "queue") ? "active" : ""; ?>"><a href="/state/queue/">Queue</a></li>
                    </ul>
                </div>
            </nav>

            <?php require_once '../app/views/' . $view . '.php'; ?>

        </div>
    </body>
</html>