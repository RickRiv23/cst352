$(document).ready(function(){
            $('.pet').click(function(){
                //alert( $(this).attr("id") );
                
                $('#petInfoModal').modal("show");
                
                $.ajax({
                    
                    type: "GET",
                    url: "api/getPetInfo.php",
                    dataType: "json",
                    data: { "id":$(this).find('.petLink').attr("id") },
                    success: function(data,status) {
                    // alert(data.description);
                    $("#petName").html(data.name);
                    $("#petDescription").html(data.description);
                    $("#petImg").attr("src", "img/" + data.pictureURL);
                    $("#type").html(data.type);
                    $("#color").html(data.color);
                    $("#breed").html(data.breed);
                    
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                    }
                
                });//ajax
            }); 
        });