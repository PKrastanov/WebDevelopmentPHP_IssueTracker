<div class="jumbotron">
    <?php
    foreach ($this->issues as $issue) : ?>
        <? if ($issue['status'] === "resolved") :?>
            <div class="panel panel-warning">
        <? else: ?>
            <div class="panel panel-success">
        <? endif; ?>
            <div class="panel-heading">
                <h3 class="panel-title"><?= htmlspecialchars($issue['title']) ?></h3>
            </div>
            <div class="panel-body">
                <?= htmlspecialchars($issue['description']) ?>
            </div>
        </div>
    <?php endforeach ?>
</div>