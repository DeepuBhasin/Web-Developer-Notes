<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Methodt</title>
</head>
<body>
    <form id="formId">
        <input type="text" name="uname" id="uname" placeholder="Enter Your Username"><br/>
        <input type="text" name="sname" id="sname" placeholder="Enter Your Surname"><br/>
        <input type="button" value="Send" id="send">
    </form>
    <div id="result">
        <h1></h1>
    </div>
    <script src="../js/jquery"></script>
    <script>
        $(document).ready(function(){
            $('#send').click(function(){
                  var uname = $('#uname').val();
                  var sname = $('#sname').val();
                  if(uname!='' || sname!=''){
                       $.get(
                           'processing.php',
                           {'uname':uname,'sname':sname},
                           function(response,status,xhr){
                               alert(response);
                               alert(status);
                               alert(xhr);
                               $('#result').text(response);
                           }
                           
                           ); 
                  } else{
                      alert('Please Enter Values');
                  } 
            });
        });
    </script>
</body>
</html>