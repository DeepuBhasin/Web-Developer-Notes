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
    <h1>Add Data using PHP with ajax</h1>
    <form id="insertForm">
      First Name*  <input type="text" id="firstName" name="firstName" placeholder="Enter First Name" required=""><br/><br/>
      Last Name*  <input type="text" id="lastName" name="lastName" placeholder="Enter Last Name" required=""><br/><br/>
        <button type="button" id="load-button" value="Load Data">Submit Data</button>
    </form>
    <br/>
    <div id="tableId"></div>

     <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#load-button').on('click', function() {

            var fname=$('#firstName').val();
            var lname=$('#lastName').val();

            if(fname=='' || lname=='' || fname.length<=0 || lname.length<=0)
            {
                alert('All Field are Required');
            }    
           else{
                 $.ajax({

                    url: 'ajax-insert.php',
                    type: 'POST',
                    data : {'firstName':fname,'lastName':lname},
                    success: function(data) {
                        $('#tableId').html(data);
                        $('#insertForm').trigger('reset');
                    }
                });
           }
        });
    });
    </script>
</body>

</html>