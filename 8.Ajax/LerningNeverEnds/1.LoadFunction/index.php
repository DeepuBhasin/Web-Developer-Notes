<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load Function </title>
</head>
<body>
    <div id="getDatatext">
        <h1>Welcome to jquery Ajax Text</h1>
        <br/>
        <button type="button" id="btnText">Click to get Data From Text</button>
    </div>
    <div id="getDatahtml">
        <h1>Welcome to jquery Ajax Html</h1>
        <br/>
        <button type="button" id="btnHtml">Click to get Data From Html</button>
    </div>
   <script src="../js/jquery.js"></script> 
   <script>
       $(document).ready(function(){
            $('#btnText').click(function(){
                    $('#getDatatext').load('textFile.txt');   
            });

            $('#btnHtml').click(function(){
                    $('#getDatahtml').load('htmlFile.html',function(responseTxt,statusTxt,xhr){
                        alert(responseTxt);
                        alert(statusTxt);
                        console.log(xhr);
                        alert('Ajax Call Completed Successfully');
                    });   
            });
       });

   </script>
</body>
</html>