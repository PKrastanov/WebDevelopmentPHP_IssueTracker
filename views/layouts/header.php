<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Issue Tracker</title>
    <link rel="stylesheet" href="/content/styles/bootstrap.css.map"/>
    <link rel="stylesheet" href="/content/styles/bootstrap.min.css"/>
    <link rel="stylesheet" href="/content/styles/styles.css"/>
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
                            <li><a href="/issues">Issues</a></li>
                        </ul>
                        <? if ($_SESSION['username'] == null) : ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li>Hello <? echo $_SESSION['username'] ?>
                                    <form action="/account/logout"><input type="submit" value="Logout"/></form>
                                </li>
                            </ul>
                        <? else : ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/account/login">Login</a></li>
                            </ul>
                        <? endif; ?>
                    </div>
                </div>
            </nav>
        </header>