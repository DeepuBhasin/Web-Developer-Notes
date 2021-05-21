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
    .delete-btn{
        background:red;
        color: #fff;
        border: 0px;
        padding: 4px 10px;
        border-radius: 3px;
        cursor: pointer;

    }
    .edit-btn {
        background:green;
        color: #fff;
        border: 0px;
        padding: 4px 10px;
        border-radius: 3px;
        cursor: pointer;
    }
    #model{
        background: rgb(0,0,0,0.7);
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        display: none;


    }
    #modal-form{
        background: #fff;
        color:#000;
        width: 30%;
        position: relative;
        top: 20%;
        left: 34%;
        padding: 15px;
        border-radius: 4px;


    }
     #modal-form tr td {color: #000;}
     #modal-form h2 {
         margin: 0 0 15px;
         padding-bottom: 10px;
         border-bottom: 1px solid #000;

          }
    #close-btn{
        background: red;
        color: #fff;
        width: 30px;
        height: 30px;
        min-height: 30px;
        text-align: center;
        border-radius: 50%;
        position: absolute;
        top:-15px;
        right: -15px;
        cursor: pointer;
    }

    body table th {
        color: black;
    }
    </style>
</head>

<body>
    <h1>Show Data using PHP with ajax</h1>
    <div id="search-bar">
        <label for="search">Search</label>
        <input type="text" id="search" autocomplete="off" placeholder="Enter Name ...">
        
    </div>
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
    <div id="model">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <table cellpadding="10px" width="100%">
                
            </table>
            <div id="close-btn">X</div>

        </div> 
    </div>
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
            function loadPage() {
                $.ajax({
                    url: 'ajax-load.php',
                    type: 'POST',
                    success: function(data) {
                        $('#tableId').html(data);
                    }
                });
            }

            loadPage();
    
        $(document).on('click','.delete-btn',function(){
            
            if(confirm('Do you really want to Delete the Record ?')){

            var studentId = $(this).data('id');                  // using data-id (data is html5 feature which allowed to create any kind of thing like id class on that basis we created dynamic button function , previous i was using onlick(this) concept which is not good practise )
            
            var element = this;                         // getting element (very conceptual)

            $.ajax({
                    url: 'ajax-delete.php',
                    type: 'POST',
                    data : {'id':studentId},
                    success: function(data) {
                        if(data==1){
                            $(element).closest('tr').fadeOut();                 // removing the parent element which is tr

                        }else{
                            console.log(data);
                        }

                    }
                });

            loadPage();

             }
        });


        // show model box
        $(document).on('click','.edit-btn',function(){
            $('#model').show();
             var studentId = $(this).data('eid'); 
               $.ajax({
                    url: 'load-update-form.php',
                    type: 'POST',
                    data : {'id':studentId},
                    success: function(data) {
                        $('#modal-form table').html(data);
                     }
                });
            });

         // Hide model box
         $("#close-btn").on('click',function(){
             $('#model').hide();
        });

         //save update form
         $(document).on('click','#edit-submit',function(){
            var studentId=$('#edit-id').val();
            var fname=$('#edit-fname').val();
            var lname=$('#edit-lname').val();

            $.ajax({
                    url: 'ajax-update-form.php',
                    type: 'POST',
                    data : {'id':studentId,'firstName':fname,'lastName':lname},
                    success: function(data) {
                        $('#model').hide();
                         if(data==true){
                           
                              loadPage();
                        }
                        else{
                            console.log(data);
                        }
                     }
                });
         });

        // Live Serach 
        $('#search').on('keyup',function(){
            var serach_term=$(this).val();
             $.ajax({
                    url: 'ajax-live-serach.php',
                    type: 'POST',
                    data : {'search':serach_term},
                    success: function(data) {
                       $('#tableId').html(data);
                     }
                });
        }) ;

    });

    </script>
</body>

</html>