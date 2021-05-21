<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1>This is create page</h1>
    <form action="{{url('/store')}}" method="post">
        {{csrf_field()}}
        <input type="text" name="name" id="" placeholder="Enter Name"><br />
        <select name="gender" id="">
            <option value="">Seletc Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br />
        <input type="number" name="age" id="" placeholder="Enter Age"><br />
        <input type="text" name="designation" id="" placeholder="Enter Designation"><br />
        <input type="submit" value="Submit">


    </form>
</body>

</html>