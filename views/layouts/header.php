<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Issue Tracker</title>
    <link rel="stylesheet" href="/content/styles/bootstrap.css.map"/>
    <link rel="stylesheet" href="/content/styles/bootstrap.min.css"/>
    <link rel="stylesheet" href="/content/styles/styles.css"/>
    <script src="/content/jquery-1.11.3.min.js"></script>
    <script src="/content/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/">Issue Tracker</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                        <ul class="nav navbar-nav">
                            <li><a href="/">Home</a></li>
                            <?php if ($this->isLoggedIn()) : ?>
                                <li><a href="/issues/create">Create Issue</a></li>
                            <?php endif; ?>
                        </ul>
                        <?php if ($this->isLoggedIn()) : ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a>Hello <?php echo $_SESSION['username'] ?></a></li>
                                <li><a href="/account/logout">Logout</a></li>
                            </ul>
                        <?php endif; ?>
                        <?php if (!$this->isLoggedIn()) : ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/account/login">Login</a></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </header>
        <?php include_once('views/layouts/notifications.php'); ?>