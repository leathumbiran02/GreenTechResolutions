<?php
    require 'vendor/autoload.php';

    //Using the database configuration file:
    require_once('db_config.php');

    if (isset($_POST['chat_submit'])){
        
        //Getting the data from the contact us form:
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $reasonSelect = $_POST['reason'];
        $otherReason = isset($_POST['other_reason']) ? $_POST['other_reason'] : '';

        //Configuring the SMTP server settings:
        $smtp_server = 'smtp.gmail.com'; //Using gmail
        $smtp_port = 587; //Using a specific port number
        $smtp_username = 'greentechresolutions@gmail.com'; //Email address that will be used to send the welcoming message emails
        $smtp_password = 'atxctbwwroycsivl'; //App password that was generated for gmail so that the email address can be used by other programs.
            
    //Creating a connection to the database:
    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        
        if (!$connect) { //If the connection fails, display an error:
            die("Connection failed!" . mysqli_connect_error());
        }

        $sqlquery = $connect->prepare("
        INSERT INTO chat
        (full_name, email, reason, other_reason) 
        VALUES (?,?,?,?)");

        $sqlquery->bind_param("ssss",$full_name, $email, $reasonSelect, $otherReason); //Bind the parameters:
        $sqlquery->execute(); //Execute the statement:

        if ($sqlquery) { //If the connection is made and the data is inserted:

            //Successful registration so send a welcome message email to the user:
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                    
            try{ //Using try catch for error handling:

                //Configuring the mail server settings:
                $mail->isSMTP();
                $mail->Host= $smtp_server;
                $mail->SMTPAuth= true;
                $mail->Username= $smtp_username;
                $mail->Password= $smtp_password;
                $mail->SMTPSecure= 'tls';
                $mail->Port= $smtp_port;

                //Specifying the recipients of the email:
                $mail->setFrom($smtp_username, 'GreenTech Resolutions');
                $mail->addAddress($email, $full_name);

                //Specifying the content of the email:
                $mail->isHTML(true);
                $mail->Subject = 'Chat Request';
                $mail->Body    = "
                Dear $full_name,
                <br><br>Welcome to GreenTech Resolutions!
                <br><br>One of our consultants will contact you soon.<br>
                <br>If you have any other enquiries, please let us know.
                <br><br>Hoping to hear from you soon,
                <br>The GreenTech Resolutions Team";

                //Sending the email to the user:
                $mail->send();

                //Generating a success message to the user:
                echo '<script>alert("Your chat request has been sent! Please check your email.")</script>';
                header("Refresh:1; url=chat.php"); 
                exit;
            }
            catch(Exception $e){ //If the email fails for any reason:
                echo '<script>alert("Error sending email. Please try again later.")</script>'; 
                header("Refresh:1; url=chat.php"); //Redirect to the contact us page so that the user can try again:
                exit;
            }
        } else { //If the email fails for any reason:
            echo '<script>alert("Error sending email. Please try again later.")</script>'; 
            header("Refresh:1; url=chat.php"); //Redirect to the contact us page so that the user can try again:
            exit;
        }
    }
?>
