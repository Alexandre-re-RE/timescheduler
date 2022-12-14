<?php ob_start(); ?>
    <form action="/roles" method="POST">
        <label>
            Code
            <input type="text" name="code" />
        </label>

        <label>
            Name
            <input type="text" name="name" />
        </label>

        <button type="submit">Créer</button>
    </form>
<?php $content = ob_get_clean() ?>

<?php require_once(TEMPLATES . 'Layout/default.php') ?>
