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

        <h2>Edit Skill</h2>

        <form method="post" action="/console/skills/edit/<?= $skill->id ?>" novalidate class="w3-margin-bottom">

            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label class="d-block" for="name">Name:</label>
                <input class="w3-input" type="text" name="name" id="name" value="<?= old('name', $skill->name) ?>" required>

                <?php if ($errors->first('name')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('name'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label class="d-block" for="reference_url">Reference URL:</label>
                <input class="w3-input" type="url" name="reference_url" id="reference_url" value="<?= old('reference_url', $skill->reference_url) ?>">

                <?php if ($errors->first('reference_url')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('reference_url'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label class="d-block" for="confidence">Confidence:</label>
                <input class="w3-input" type="number" name="confidence" id="confidence" value="<?= old('confidence', $skill->confidence) ?>" required>

                <?php if ($errors->first('confidence')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('confidence'); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="w3-button w3-green">Save</button>
        </form>

        <a href="/console/skills/list">Back to List</a>
    </section>

</body>

</html>
