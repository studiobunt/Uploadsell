<?
   
        
        $subject=$_POST['subject'];
        $mail=$_POST['email'];
        $poruka=$_POST['comments'];
       
       
        $za="dzenan555@hotmail.com";
       
       
       
      
   
        if(mail($za,$subject,$poruka,$mail))
   
        {
   
        echo "<script>alert('Thanks for contacting us. We will reply to e-mail adress that you entered in next 24. hours.');</script>";
        } else {
   
        echo "<script>alert('An error ocurred. It may be your e-mail is incorrect or not valid.');</script>";
       
        }
   
        ?>