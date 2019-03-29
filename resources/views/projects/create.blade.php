<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Projects</h1>

    <form method="post" action="/projects">

        {{csrf_field()}}

        <input type="text" name="title" placeholder="Project Title"> <br />

        <textarea name="description" placeholder="Project Description Here..."></textarea> <br />

        <input type="submit" name="Submit">

    </form>
</body>
</html>
