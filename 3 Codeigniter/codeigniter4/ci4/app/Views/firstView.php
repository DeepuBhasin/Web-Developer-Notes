<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>This is First Page</h1>
    <h1>{name}</h1>

    {subject_list_loop}
    <h1>{subject} :: {marks}</h1>
    {/subject_list_loop}

    {if $status}
    <p>Yes values is true</p>
    {endif}
</body>

</html>