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
        text-align: left;
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
    <h1>Read Json Data usig Jquery</h1>
    <br/>

    <h2>For Single Value </h2>
    <div id="load-data"></div>

    <h2>For Multiple Value</h2>	
    	<div id="load-dataMultiple"></div>
  	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        
             $.ajax({
				url: 'jsonData/mySingle.json',
                type: 'POST',
                // dataType : "json",
                success: function(data) {
                   	// console.log(data);

                   	$('#load-data').append('Id is : ' + data.id + ' <br/> Title is : ' + data.title+ ' <br/> body is : ' +data.body ) ;
                   
                }
            });



              $.ajax({
				url: 'jsonData/myMultiple.json',
                type: 'GET',
                success: function(data) {
                   	$.each(data,function(key,value){
                   		$('#load-dataMultiple').append('Id is : ' + value.id + ' <br/> Title is : ' + value.title+ ' <br/> body is : ' +value.body +'<br/><br/>') ;
                   	});
                   
                   	// $('#load-data').append('Id is : ' + data.id + ' <br/> Title is : ' + data.title+ ' <br/> body is : ' +data.body ) ;
                   
               } 
            });

              $.getJSON(
                "jsonData/mySingle.json",
                    function(data){
                    console.log(data);
              })
        });
    
    </script>
</body>

</html>