$(document).ready(function(){


    $('.btnDelete').dblclick(function(){
        
        var tablename = $(this).data("table");
        var columnid = $(this).data("column");
        var valueid = $(this).data("idvalue");

        //alert(tablename + " " + columnid + " " + valueid);
        $.ajax({
            url : "delete.php",
            method : "POST",
            dataType : "text",
            data : {
                tablename : tablename,
                columnid : columnid,
                valueid : valueid
            },
            success : function(response){
                if(response == "Success"){
                    alert("Successful delete customer!");
                    location.reload(true);
                }else{
                    alert("Fail try again!");
                    location.reload(true);
                }
            }
        });
        
    });

    $('.btnAdd').click(function(){
        window.location.href = "customer-registration.php";
    });

    $('.btnEdit').click(function(){
     //empty all error message
     $('.error').text("");

      $('.fname').val($(this).data("fname"));
      $('.lname').val($(this).data("lname"));
      $('.tname').val($(this).data("tname"));
      $('.fname').val($(this).data("fname"));
      $('.cid').val($(this).data("id"));

      var genderid = $(this).data("genderid");
      var gendername = $(this).data("gendername");
      
      //gender

      $.ajax({
          url : "getGender.php",
          method : "POST",
          dataType : "text",
          data : {
              genderid : genderid,
              gendername : gendername
          },
          success : function(data){
              $('.gender').html(data);
          }
      });
      $('.add-gender-cont').css({"display":"none"});
      $('.edit-co').css({"display":"block"});

    });

    $('.btnClose').click(function(){
        $('.edit-co, .add-gender-cont').css({"display":"none"});
    });

    $('#edit-form').on("submit", function(e){
        e.preventDefault();

       //check if input data is less than 3 character
       if($('.fname').val().length < 3){
           $('.error-report').text("First name is too short!");
       }else{
        //send data to make update
        $.ajax({
            method: 'POST',
            url: 'update-customer.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                alert(data);
                location.reload(true);
            }
        });
       }


    });


    $('.add-gender').click(function(){
        $('#input-customer-container').css({"display":"none"});
        $('.add-gender-cont').css({"display":"block"});
    });

    //send gender data for insert
    $('#add-form').on("submit", function(e){
        e.preventDefault();

        $.ajax({
            method: 'POST',
            url: 'add-gender.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                alert(data);
                location.reload(true);
            }
        });

    });


    $('.add-gender').click(function(){
        $('#input-customer-container').css({"display":"none"});
        $('.add-gender-cont').css({"display":"block"});
    });

    //register customer
    $('#register-cus').on("submit", function(e){
        e.preventDefault();


       //check if input data is less than 3 character
       if($('.fnames').val().length < 3){
        $('.error-rep').text("First name is too short!");
       }else{
        $.ajax({
            method: 'POST',
            url: 'registration-process.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(data){
                alert(data);
                location.reload(true);
            }
        });

      }

    });

});