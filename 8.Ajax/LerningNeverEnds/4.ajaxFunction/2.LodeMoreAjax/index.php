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
    <div id="loader" style="display:none"><img src="loading.gif" alt="loading" height=100 width=100></div>
    <script src="../js/jquery"></script>
    <script>
        $(document).ready(function(){
            $('#send').click(function(){
                  var uname = $('#uname').val();
                  var sname = $('#sname').val();
                  if(uname!='' || sname!=''){
                     $.ajax({
                         url:'processing.php',
                         type:'POST',
                         data:{'sname':sname,'uname':uname},
                         beforeSend:function(){
                            $('#loader').show();
                         },
                         success:function(result,status,xhr){
                             alert('success Message : ' + result);
                             alert('success Message : ' + status);
                             alert('success Message : ' + xhr);
                             $('#loader').hide();
                         },
                         error: function(xhr,status,result){
                            alert('erorr Message : ' + result);
                             alert('erorr Message : ' + status);
                             alert('erorr Message : ' + xhr);
                         }  
                     }); 
                  } else{
                      alert('Please Enter Values');
                  } 
            });
        });
    </script>
</body>
</html>