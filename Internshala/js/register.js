// Filevalidation = () => {
//     const fi = document.getElementById('pro_photo');

//     var file = $('input[type="file"]').val();
//       var exts = ['doc','docx','rtf','odt','pdf'];
//       // first check if file field has any value
//       if ( file ) {
//         // split file name at dot
//         var get_ext = file.split('.');
//         // reverse name to check extension
//         get_ext = get_ext.reverse();
//         // check file type is valid as given in 'exts' array
//         if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
//            return true;
//         } else {
//             $("#error1").fadeIn(1000, function () {
//                 $('#error1').html('<h6 class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> NOt allowed   </h6>')
                
                
//             });
//             return false;
//         }
//       }
    // Check if any file is selected. 
    // if (fi.files.length > 0) {
    //     for (const i = 0; i <= fi.files.length - 1; i++) {

    //         const fsize = fi.files.item(i).size;
    //         const file = Math.round((fsize / 1024));
    //         // The size of the file. 
    //         if (file >= 4096) {
    //             alert(
    //                 "File too Big, please select a file less than 4mb");
    //         } else if (file < 2048) {
    //             alert(
    //                 "File too small, please select a file greater than 2mb");
    //         } else {
    //             document.getElementById('size').innerHTML = '<b>'
    //                 + file + '</b> KB';
    //         }
    //     }
    // }
// }





function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        $('#error1').html('<h6 class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>Not Allowed Type  </h6>')
        fileInput.value = '';
        return false;
    }else{
        $("#error1").fadeOut();
       return true;
    }
}


// $('document').ready(function() {
//     /* handle form validation */
    
//     $("#user_regis_form").validate({
//     rules:
//     {
//         user_name: {
//     required: true,
//     minlength: 3
//     },
    
//         user_password: {
//     required: true,
//     minlength: 8,
//     maxlength: 15
//     },
    
//     user_email_id: {
//     required: true,
//     email: true
//     },
    
//     },
//     messages:
//     {
//     user_name: "please enter user name",
   
//     user_password:{
//     required: "please provide a password",
//     minlength: "password at least have 8 characters"
//     },
//     user_email_id: "please enter a valid email address",
    
//     },
//     submitHandler: submitForm
//     });
  
//     /* handle form submit */
//     function submitForm() {
//     var data = $("#user_regis_form").serialize();
//     $.ajax({
//     type : 'POST',
//     url : 'user_register.php',
//     data:data,
//     beforeSend: function() {
//     $("#error").fadeOut();
//     $("#btn-save").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
//     },
//     success : function(response) {
//     alert(response);
//     }
//     });
//     return false;
//     }
//     });








$(document).ready(function(){




    
    $('#user_regis_form').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url:"user_register.php",
            method:'POST',
            data:new FormData(this),
            contentType:false,
            processData:false,
            beforeSend: function () {
                $("#error1").fadeOut();
                $("#btn-save").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
            },
            success:function(data)
            {
                // alert(data);
                if($.trim(data)=="register")
                {
                    $("#error1").fadeIn(1000, function () {
                        $('#error1').html('<h6 class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> User Already Register<br> Please Perform Login  </h6>')
                        $("#btn-save").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account ');
                        
                    });
                }
                else if($.trim(data)=="inserted")
                {
                    $("#error1").fadeIn(1000, function () {
                        $('#error1').html('<h6 class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> User Successfully register </h6>')
                        $("#btn-save").html('<span class="glyphicon glyphicon-log-in"></span>   Create Account ');
                            
                        
                    });
                }

            }

        })
    })
})