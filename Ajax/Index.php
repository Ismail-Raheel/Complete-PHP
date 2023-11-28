<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & AJAX</title>
</head>
<body>
    
<link rel="stylesheet" href="css/style.css">

<table id="main" border="0" cellpadding="0">
    <tr>
        <td id="header">
            <h1>Add Records With PHP & AJAX</h1>
            <div id="search-bar">
            <label>Search:</label>
            <input type="text" id="search" autocomplete="off">
            </div>
        </td>
    </tr>

    <tr>
        <td id="table-form">
        <form id="addform">
            F Name <input type="text" id="fname"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            L Name <input type="text" id="lname">
            <input type="button" value="Submit" id="save-button">
        </form>
        </td>     
    </tr>
    <tr>
    <td id="table-data"></td>
    </tr>
</table>


<div id="error-message"></div>
<div id="success-message"></div>


<div id="modal">
<div id="modal-form">
    <h2>Edit Form</h2>
    <table cellpadding="10px" width="100%">
    </table>
    <div id="close-btn">X</div>
</div>
</div>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">


$(document).ready(function(){

function loadTable(){

$.ajax({
    url: "ajax_showdata.php",
    type: "POST",
    success:function(data){
        $("#table-data").html(data)
    }

})

}

loadTable();



$("#save-button").on("click",function(e){
    e.preventDefault();
    var fname = $("#fname").val();
    var lname = $("#lname").val();

    if(fname =="" || lname == ""){
        $("#error-message").html("All Field Are Required").slideDown();
        $("#success-message").slideUp();
    }
    else{

        $.ajax({
        url: "ajax_insertdata.php",
        type: "POST",
        data:{first_name:fname, last_name:lname},
        success:function(data){
        if(data == 1){
            loadTable();
            $("#addform").trigger("reset");
            $("#success-message").html("Data Inserted Successfull.").slideDown();
            $("#error-message").slideUp();
        }
        else{
            $("#error-message").html("can't save record.").slideDown();
            $("#success-message").slideUp();
        }    
        }
        })

    }

   
    
})


$(document).on("click",".delete-btn",function(){

    if(confirm("Do you really want to delete this record")){
    $studentId = $(this).data("id");
    var element = this;
    $.ajax({

        url: "ajax_deletedata.php",
        type: "POST",
        data:{id: $studentId},
        success:function(data){

        if(data == 1){    
            // loadTable();   
            $(element).closest("tr").fadeOut();
            $("#success-message").html("Data Deleted Successfull").slideDown();
            $("#error-message").slideUp();  
        }
        else{
            $("#error-message").html("Can't Delete record").slideDown();
            $("#success-message").slideUp();
        }
        }
    })}
})


$(document).on("click",".edit-btn",function(){

    $("#modal").show();
    var studentId = $(this).data("eid");

    $.ajax({
        url: "ajax_editable_form.php",
        type: "POST",
        data:{id : studentId},
        success:function(data){      
        $("#modal-form table").html(data);

        }        

    })
})



$("#close-btn").on("click",function(){
    $("#modal").hide();
})


$(document).on("click","#edit-submit",function(){

    var std_id = $("#edit-id").val();
    var std_first = $("#edit-fname").val();
    var std_last = $("#edit-lname").val();

    $.ajax({

        url: "ajax-update-form.php",
        type: "POST",
        data:{id:std_id,first_name:std_first,last_name:std_last},
        success:function(data){
        if(data == 1){
            $("#modal").hide();
            loadTable();
            $("#success-message").html("Data updated successfull").slideDown();
            $("#error-message").slideUp();

        }
        else{
            $("#error-message").html("Data can't Update").slideDown();
            $("#success-message").slideUp();
        }

        }
    


    })

})




$("#search").on("keyup",function(){
    var search_term = $(this).val();

    $.ajax({
    url: "ajax-live-search.php",
    type: "POST",
    data: {search:search_term},
    success:function(data){
    $("#table-data").html(data);
    }

})

})  



})





</script>
</body>
</html>