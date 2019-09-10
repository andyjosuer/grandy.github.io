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
         $("#remove").click(function()
         {
           $("#uname").val('');
         });
         
      });
 