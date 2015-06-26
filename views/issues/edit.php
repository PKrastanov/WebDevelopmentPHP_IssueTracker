<div class="jumbotron">
    <div class="container">
        <div class="form-horizontal">
            <form action="/issues/edit" method="POST">
                <input type="hidden" name="id"  value="<?= $this->issue['id'] ?>">
                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="title" id="title" value="<?= $this->issue['title'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-lg-2 control-label">Description</label>
                    <div class="col-lg-10">
                        <textarea class="form-control"  name="description" rows="3"><?= $this->issue['description'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="state" class="col-lg-2 control-label">State</label>
                    <div class="col-lg-10">
                        <select class="form-control" name="state" id="state">

                            <option
                            <?php if ($this->issue['state'] == "Open"): ?>
                                    selected="selected"
                            <?php endif; ?>>Open</option>
                            <option
                            <?php if ($this->issue['state'] == "New"): ?>
                                selected="selected"
                            <?php endif; ?>>New</option>
                            <option
                            <?php if ($this->issue['state'] == "Fixed"): ?>
                                selected="selected"
                            <?php endif; ?>>Fixed</option>
                            <option
                            <?php if ($this->issue['state'] == "Closed"): ?>
                                selected="selected"
                            <?php endif; ?>>Closed</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Edit Issue"/>
                </div>
            </form>
        </div>
    </div>
</div>