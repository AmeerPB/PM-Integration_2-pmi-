<?php if (count($errors) > 0) : ?>

    <div>
        <?php foreach ($errors as $error) : ?>
            <p><?php print $error ?></p>
        <?php endforeach ?>
    </div>

<?php endif ?>

