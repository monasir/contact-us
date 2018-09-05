<?php
    $msg = "";
    use PHPMailer\PHPMailer\PHPMailer;
    
    include_once "PHPMailer/PHPMailer.php";
    include_once "PHPMailer/Exception.php";
    include_once "PHPMailer/SMTP.php";
    // define variables and set to empty values
    
    $name = $email = $phone = $message = $url = $success = "";

    if(isset($_POST['submit'])) {
        $subject = "Interested customers";

        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]); 
        $phone = test_input($_POST["phone"]);
        
        $message_body = '';
        unset($_POST['submit']);
        foreach ($_POST as $key => $value){
            $message_body .=  "$key: $value<br />";
        }        
        $mail = new PHPMailer();

        //if we want to send via SMTP
        $mail-> Host= "smtp.gmail.com";
        //$mail->isSMTP();
        $mail->SMTPAuth=true;
        $mail->Username="nasmo795@gmail.com";
        $mail->Password="Inter329";
        $mail->SMTPSecure = "ssl";//TLS
        $mail->Port = 465; //587


            
        $mail->addAddress('mohd.204@live.com');
        $mail->setFrom("nasmo795@gmail.com");
        $mail->Subject= $subject;
        $mail->isHTML(true);
        $mail->Body = $message_body;
        

            if ($mail->send()){
                $success ="Your email has been sent, thank you";
                $name = $email = $phone = $message= "";

            }
            else {
                $success= "Please try agian!";
                echo $mail->ErrorInfo;    

            }

         }
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    
</head>
<body>
<div class="main-container">
            <div class="hack-fix">
                <header>
                    <a href="#"><img src="HR.jpg" alt="logo" class="image"></a>
                    <a href="#"><h3>MANSERVE</h3></a>
                </header>
            </div>

            <div class="pg-content">
                <div class="div1">
                    <h1>MAKE YOUR LIFE EASIER WITH OUR MULTITUDE HUMAN RESOURCE</h1>
                    <h4 class="h4">EMAIL US AT MOHD.204@LIVE.COM</h4>
                </div>
                <div class="div2">
                    <img src="hrwoman.jpg" alt="human resource woman" height="335" width="300">
                </div>
                <div class="slidecont">
                    <div class="aboutus">
                        <h3 class="h3">About Us</h3>
                        <p class="para1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro rem molestiae soluta doloremque ducimus. Adipisci pariatur magni laudantium ullam vel veniam, nesciunt praesentium, saepe hic, eius tenetur reiciendis doloribus quae.</p>
                        <p class="para2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro rem molestiae soluta doloremque ducimus. Adipisci pariatur magni laudantium ullam vel veniam, nesciunt praesentium, saepe hic, eius tenetur reiciendis doloribus quae.</p>
                    </div>
                    <div class="services" style="text-align:center">
                            <h1>Services</h1>
                            <div class="dotdot">
                                <span class="dot"><p>Fuck You</p></span>
                                <span class="dot"><p>Fuck You</p></span>
                                <span class="dot"><p>Fuck You</p></span>
                                <span class="dot"><p>Fuck You</p></span>
                                <span class="dot"><p>Fuck You</p></span>
                                <span class="dot"><p>Fuck You</p></span>
                                <span class="dot"><p>Fuck You</p></span>
                                <span class="dot"><p>Fuck You</p></span>
                            </div>
                    </div>

                </div>
                <div class="contactus">
                
                    <form method="post" action="sendemail.php" class="form" enctype="multipart/form-data">
                        <label for="input-name"  >Name</label>
                        <input type="text" name="name" class="form-input" id="input-name" oninput="checkInput()">
                        <label for="input-mail">Mail</label>
                        <input type="text" name="email" class="form-input" id="input-mail" oninput="checkInput()">
                        <label for="input-message">phone</label>
                        <input type="text" name="phone" class="form-input" id="input-phone" oninput="checkInput()">
                        
                        <button class="submit-button" name="submit" disabled>Submit</button>
                        <div style="color:white;">Contact Us</div>
                    </form>
                   
                </div>
            </div>

    </div>

    <script src="slider.js"></script>

</body>
</html>



