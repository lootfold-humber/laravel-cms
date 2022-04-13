<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Portfolio</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/app.css">

    <script src="/app.js"></script>

</head>

<body>


    <header class="w3-padding">

        <h1 class="w3-text-red">Portfolio Console</h1>

        <?php if (Auth::check()) : ?>
            You are logged in as <?= auth()->user()->first ?> <?= auth()->user()->last ?> |
            <a href="/console/logout">Log Out</a> |
            <a href="/console/dashboard">Dashboard</a> |
            <a href="/">Website Home Page</a>
        <?php else : ?>
            <a href="/">Return to My Portfolio</a>
        <?php endif; ?>

    </header>

    <hr>

    <section class="w3-padding">

        <h2>Add Project</h2>

        <form method="post" action="/console/projects/add" novalidate class="w3-margin-bottom">

            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label class="d-block" for="title">Title:</label>
                <input class="w3-input" type="title" name="title" id="title" value="<?= old('title') ?>" required>

                <?php if ($errors->first('title')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('title'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label class="d-block" for="url">URL:</label>
                <input class="w3-input" type="url" name="url" id="url" value="<?= old('url') ?>">

                <?php if ($errors->first('url')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('url'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label class="d-block" for="slug">Slug:</label>
                <input class="w3-input" type="text" name="slug" id="slug" value="<?= old('slug') ?>" required>

                <?php if ($errors->first('slug')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('slug'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label class="d-block" for="content">Content:</label>
                <textarea name="content" id="content" required><?= old('content') ?></textarea>

                <?php if ($errors->first('content')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('content'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label class="d-block" for="type_id">Type:</label>
                <select class="w3-input" name="type_id" id="type_id">
                    <option></option>
                    <?php foreach ($types as $type) : ?>
                        <option value="<?= $type->id ?>" <?= $type->id == old('type_id') ? 'selected' : '' ?>>
                            <?= $type->title ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if ($errors->first('type_id')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('type_id'); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="w3-button w3-green">Add</button>

        </form>

        <a href="/console/projects/list">Back to List</a>

    </section>

</body>

</html>
