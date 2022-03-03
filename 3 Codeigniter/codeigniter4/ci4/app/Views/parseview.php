<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>{heading|upper}</h1>
    <h2>{name|lower}</h2>
    <h3>{dob|date(Y-m-d)}</h3>
    <h4>{salary|local_currency(INR)}</h4>
    <h5>{gig|round}</h5>
    <h6>{description|limit_chars(8)}</h6>
    <h2>{phone|hideNumbers}</h2>
    <h2>{description|vowelscount}</h2>
</body>

</html>