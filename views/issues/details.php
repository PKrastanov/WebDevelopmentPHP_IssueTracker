<div class="jumbotron">
    <div class="container">
        <?php if ($this->issue['state'] == "New"): ?>
            <div class="panel panel-primary">
        <?php endif; ?>

        <?php if ($this->issue['state'] == "Fixed"): ?>
            <div class="panel panel-success">
        <?php endif; ?>

        <?php if ($this->issue['state'] == "Open"): ?>
            <div class="panel panel-warning">
        <?php endif; ?>

        <?php if ($this->issue['state'] == "Closed"): ?>
            <div class="panel panel-default">
        <?php endif; ?>

            <div class="panel-heading">
                <h3 class="panel-title"><?= $this->issue['title'] ?></h3>
            </div>
            <div class="panel-body">
                <?= $this->issue['description'] ?>
                <p>Author: <?= $this->issue['author'] ?></p>
                <?php if ($this->isLoggedIn()) : ?>
                <button class="btn btn-primary pull-right" onclick="window.location='/issues/edit/<?= $this->issue['id'] ?>'">Edit</button>
                <?php endif; ?>
            </div>
        </div>

        <?php
        foreach ($this->comments as $comment) : ?>
            <div class="well">
                <?php echo $comment[1] ?>
                <span class="pull-right"><?php echo $comment[3] ?></span>
            </div>
        <?php endforeach ?>

        <?php if ($this->isLoggedIn()) : ?>
        <div class="form-horizontal">
            <form action="/issues/comment" method="POST">
                <input type="hidden" name="id"  value="<?= $this->issue['id'] ?>">
                <div class="form-group">
                    <label for="comment" class="col-lg-2 control-label">Comment</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" name="comment" rows="3" id="comment"></textarea>
                    </div>
                </div>
                <div class="col-lg-10 col-lg-offset-2">
                    <input type="submit" class="btn btn-primary" value="Add Comment"/>
                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
</div>