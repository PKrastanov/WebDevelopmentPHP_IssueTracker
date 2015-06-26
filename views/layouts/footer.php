        <footer>
            <div class="panel panel-default">
                <div class="panel-heading">Issue Tracking Project</div>
                <div class="panel-body">
                    <?php
                    foreach ($this->lastComments as $comment) : ?>
                        <div class="well">
                            <?php echo $comment['content'] ?>
                            <span class="pull-right"><?php echo $comment['author'] ?></span>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
