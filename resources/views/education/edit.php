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
        <a href="/console/education/list">Back to List</a>

        <h2>Add Project</h2>

        <form method="post" action="/console/education/edit/<?= $education->id ?>" novalidate class="w3-margin-bottom">

            <?= csrf_field() ?>

            <div class="w3-margin-bottom">
                <label for="institution">Institution:</label>
                <input type="text" name="institution" id="institution" value="<?= old('institution', $education->institution) ?>">

                <?php if ($errors->first('institution')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('institution'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label for="field">Field of Study:</label>
                <input type="text" name="field" id="field" value="<?= old('field', $education->field) ?>">

                <?php if ($errors->first('field')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('field'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label for="start">Start Year:</label>
                <input type="text" name="start" id="start" value="<?= old('start', $education->start) ?>">

                <?php if ($errors->first('start')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('start'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label for="completion">Completion Year:</label>
                <input type="text" name="completion" id="completion" value="<?= old('completion', $education->completion) ?>">

                <?php if ($errors->first('completion')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('completion'); ?></span>
                <?php endif; ?>
            </div>

            <div class="w3-margin-bottom">
                <label for="education_level_id">Type:</label>
                <select name="education_level_id" id="education_level_id">
                    <option selected disabled>-- select --</option>
                    <?php foreach ($levels as $level) : ?>
                        <option value="<?= $level->id ?>" <?= $level->id == old('education_level_id', $education->education_level_id) ? 'selected' : '' ?>>
                            <?= $level->name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if ($errors->first('education_level_id')) : ?>
                    <br>
                    <span class="w3-text-red"><?= $errors->first('education_level_id'); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="w3-button w3-green">Save</button>

        </form>
    </section>
</body>

</html>
