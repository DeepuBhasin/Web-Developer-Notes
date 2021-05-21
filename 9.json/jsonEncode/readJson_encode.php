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
    <h1>Read Json Data usig Encode Json</h1>
    <br/>

    


    <h2>For Multiple Value</h2>	
    	<div id="load-data">
        <table id="load-table" border="1" cellpadding="10px">
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
          </tr>
        </table> 
      </div>
  	<script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        
          $.ajax({
			       	url: 'getData.php',
                type: 'POST',
                dataType : "JSON",
                success: function(data) {
                  // console.log(data);
                   	$.each(data,function(key,value){
                   		$('#load-table').append('<tr><td>' + value.id + '</td><td>' + value.firstName+ '</td><td>' +value.lastName +'</td></tr>') ;
                   	});
                   
               } 
            });

             
        });
    
    </script>
</body>

</html>