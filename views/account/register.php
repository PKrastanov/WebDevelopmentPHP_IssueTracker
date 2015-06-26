<div class="jumbotron">
    <div class="container">
        <div class="form-horizontal">
            <h3>Register</h3>
            <form action="/account/register" method="POST">
                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="username" id="inputName" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <input type="hidden" name="token" value="<?php echo $this->validateToken ?>">
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Register"/>
                </div>
            </form>
        </div>
    </div>
</div>