<div class="jumbotron">
    <ul class="list-group">
        <?php
        foreach ($this->issues as $issue) : ?>
            <li class="list-group-item" onclick="window.location='/issues/details/<?= $issue['id'] ?>'">
                <span class="badge"><?= htmlspecialchars($issue['state']) ?></span>
                <?= htmlspecialchars($issue['title']) ?>
            </li>
        <?php endforeach ?>
    </ul>
</div>