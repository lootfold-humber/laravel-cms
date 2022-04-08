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

        <h2>Edit Education Level</h2>

        <form method="post" action="/console/educationlevels/edit/<?= $edu->id ?>" novalidate class="w3-margin-bottom">
            <p><?= $edu->id ?></p>
            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?= old('name', $edu->name) ?>" required>

                <?php if ($errors->first('name')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('name'); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="w3-button w3-green">Save</button>
        </form>

        <a href="/console/educationlevels/list">Back to List</a>
    </section>

</body>

</html>