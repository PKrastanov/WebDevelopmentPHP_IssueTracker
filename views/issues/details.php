<div class="jumbotron">
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
            <button class="btn btn-primary pull-right" onclick="window.location='/issues/edit/<?= $this->issue['id'] ?>'">Edit</button>
        </div>
    </div>
</div>