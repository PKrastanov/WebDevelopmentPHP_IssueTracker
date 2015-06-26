<div class="jumbotron">
    <div class="container">
        <div class="form-horizontal">
            <form action="/issue/create" method="POST">
                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <textarea class="form-control"  name="description" rows="3" id="description"></textarea>
                    </div>
                </div>
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Create Issue"/>
                </div>
            </form>
        </div>
    </div>
</div>