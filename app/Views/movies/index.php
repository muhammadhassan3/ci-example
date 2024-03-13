<h2><?= esc($title) ?></h2>

<?php if (! empty($list) && is_array($list)): ?>

    <?php foreach ($list as $item): ?>

        <h3><?= esc($item['title']) ?></h3>

        <div class="main">
            <?= esc($item['description']) ?>
        </div>
        <p><a href="/movie/<?= esc($item['title'], 'url') ?>">View article</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>