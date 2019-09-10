   $(document).ready(function() 
      {
         $("#showhide").hover(function() 
         {
            if ($(this).data('val') == "1") 
            {
               $("#pwd").prop('type','text');
               $("#eye").attr("class","fa fa-eye-slash");
               $(this).data('val','0');
            }
            else
            {
               $("#pwd").prop('type', 'password');
               $("#eye").attr("class","icon fa fa-eye");
               $(this).data('val','1');
            }
         });
      });


   $(document).ready(function() 
      {
         $("#showhide1").hover(function() 
         {
            if ($(this).data('val') == "1") 
            {
               $("#confirm-pass").prop('type','text');
               $("#eye1").attr("class","fa fa-eye-slash");
               $(this).data('val','0');
            }
            else
            {
               $("#confirm-pass").prop('type', 'password');
               $("#eye1").attr("class","icon fa fa-eye");
               $(this).data('val','1');
            }
         });
      });
      
   $(document).ready(function() 
      {
         $("#showhide3").hover(function() 
         {
            if ($(this).data('val') == "1") 
            {
               $("#pwd3").prop('type','text');
               $("#eye3").attr("class","fa fa-eye-slash");
               $(this).data('val','0');
            }
            else
            {
               $("#pwd3").prop('type', 'password');
               $("#eye3").attr("class","icon fa fa-eye");
               $(this).data('val','1');
            }
         });
      });


   $(document).ready(function() 
      {
         $("#showhide4").hover(function() 
         {
            if ($(this).data('val') == "1") 
            {
               $("#confirm-pass").prop('type','text');
               $("#eye4").attr("class","fa fa-eye-slash");
               $(this).data('val','0');
            }
            else
            {
               $("#confirm-pass").prop('type', 'password');
               $("#eye4").attr("class","icon fa fa-eye");
               $(this).data('val','1');
            }
         });
      });


$(document).ready(function()

      {
         $("#remove").click(function()
         {
           $("#uname").val('');
         });
         
      });
 