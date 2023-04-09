<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        background-color: grey;
        padding: 0;
        margin: 0 auto;
        text-align: center;
        color: white;
    }

    table {
        border: solid 2px white;
        width: 500px;
        color: white;
        margin: 15px auto;
        padding: 0;


    }

    body table th {
        color: black;
    }
    </style>
</head>

<body>
    <h1>Show Data using PHP with ajax</h1>
    <form>
        <button type="button" id="load-button" value="Load Data">Load Data</button>
    </form>
    <div id="tableId">
        <!-- <table border="1" width="100%" cellspacing="0" cellpadding="10px">
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center">1</td>
                    <td align="center">Deepinder</td>
                    <td align="center">Singh</td>
                </tr>
            </tbody>
        </table> -->
    </div>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#load-button').on('click', function() {
            $.ajax({
                url: 'ajax-load.php',
                type: 'POST',
                success: function(data) {
                    $('#tableId').html(data);
                }
            });
        });
    });
    </script>
</body>

</html>