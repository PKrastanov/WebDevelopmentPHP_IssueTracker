<div class="jumbotron">
    <div class="container">
        <form class="form-horizontal">
            <fieldset>
                <legend>Login</legend>
                <form action="POST">
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <button type="button" class="btn pull-right" onclick="window.location='/register'">Register</button>
                    </div>
                </form>
            </fieldset>
        </form>
    </div>
</div>