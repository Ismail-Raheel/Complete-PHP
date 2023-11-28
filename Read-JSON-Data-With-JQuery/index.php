<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read JSON Data</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Read Json Data</h1>
        </div>

        <div id="load-data"></div>
    </div>

<script type="text/javascript" src="js/jquery.js"></script>
<script>



// $(document).ready(function(){
//     $.ajax({
//         // url: "https://jsonplaceholder.typicode.com/posts", // online link
//         // url: "json/my.json",                               //  offline 
//         type: "GET",
//         success: function(data){
//         console.log(data)
//         // $("#load-data").append(data.id + "<br>" + data.title + "<br>")
//         $.each(data,function(key,value){
//             $("#load-data").append(value.id + " " + value.title +  "<br>")
//         })

//         }
//     })
// })






// isterha bhi liksakte hai ye shortcut hai

$(document).ready(function(){
    $.getJSON(
        "json/my.json",                            
        "GET",
        function(data){
        $.each(data,function(key,value){
            $("#load-data").append(value.id + " " + value.title +  "<br>")
        })
        }
    )
})




</script>


</body>
</html>