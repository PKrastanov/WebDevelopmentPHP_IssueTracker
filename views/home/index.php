<div class="jumbotron">
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#all" data-toggle="tab" >All</a></li>
            <li><a href="#new" data-toggle="tab">New</a></li>
            <li><a href="#open" data-toggle="tab" >Open</a></li>
            <li><a href="#fixed" data-toggle="tab" >Fixed</a></li>
            <li><a href="#closed" data-toggle="tab" >Closed</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="all">
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
            <div class="tab-pane fade" id="new">
                <ul class="list-group">
                    <?php
                    foreach ($this->issues as $issue) : ?>
                    <?php if ($issue['state'] == 'New') : ?>
                        <li class="list-group-item" onclick="window.location='/issues/details/<?= $issue['id'] ?>'">
                            <span class="badge"><?= htmlspecialchars($issue['state']) ?></span>
                            <?= htmlspecialchars($issue['title']) ?>
                        </li>
                    <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="open">
                <ul class="list-group">
                    <?php
                    foreach ($this->issues as $issue) : ?>
                        <?php if ($issue['state'] == 'Open') : ?>
                            <li class="list-group-item" onclick="window.location='/issues/details/<?= $issue['id'] ?>'">
                                <span class="badge"><?= htmlspecialchars($issue['state']) ?></span>
                                <?= htmlspecialchars($issue['title']) ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="fixed">
                <ul class="list-group">
                    <?php
                    foreach ($this->issues as $issue) : ?>
                        <?php if ($issue['state'] == 'Fixed') : ?>
                            <li class="list-group-item" onclick="window.location='/issues/details/<?= $issue['id'] ?>'">
                                <span class="badge"><?= htmlspecialchars($issue['state']) ?></span>
                                <?= htmlspecialchars($issue['title']) ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="closed">
                <ul class="list-group">
                    <?php
                    foreach ($this->issues as $issue) : ?>
                        <?php if ($issue['state'] == 'Closed') : ?>
                            <li class="list-group-item" onclick="window.location='/issues/details/<?= $issue['id'] ?>'">
                                <span class="badge"><?= htmlspecialchars($issue['state']) ?></span>
                                <?= htmlspecialchars($issue['title']) ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>