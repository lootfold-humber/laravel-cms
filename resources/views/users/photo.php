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

        <h2>User Photo</h2>

        <div class="w3-margin-bottom">
            <?php if ($user->photo) : ?>
                <img src="<?= asset('storage/' . $user->photo) ?>" width="200">
            <?php endif; ?>
        </div>

        <form method="post" action="/console/users/photo/<?= $user->id ?>" novalidate class="w3-margin-bottom" enctype="multipart/form-data">

            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label for="photo">Photo:</label>
                <input type="file" name="photo" id="photo" value="<?= old('photo') ?>" required>

                <?php if ($errors->first('photo')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('photo'); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="w3-button w3-green">Add photo</button>

        </form>

        <a href="/console/users/list">Back to List</a>

    </section>

</body>

</html>
