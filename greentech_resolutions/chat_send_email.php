<?php
    //Using the file to send emails:
    require 'vendor/autoload.php';

    //Using the database configuration file:
    require_once('db_config.php');

    if (isset($_POST['chat_submit'])){ //If the chat button is clicked, execute the following code:
        
        //Getting the data from the chat form:
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $reasonSelect = $_POST['reason'];
        $otherReason = isset($_POST['other_reason']) ? $_POST['other_reason'] : '';

        //Configuring the SMTP server settings:
        $smtp_server = 'smtp.gmail.com'; //Using gmail:
        $smtp_port = 587; //Using a specific port number:
        $smtp_username = 'greentechresolutions@gmail.com'; //Email address that will be used to send the emails:
        $smtp_password = 'tiqgnnzmkbsnssdq'; //App password that was generated for gmail so that the email address can be used by other programs:
            
        //Creating a connection to the database:
        $connect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        
        if (!$connect) { //If the connection fails, display an error:
            die("Connection failed!" . mysqli_connect_error());
        }

        //Prepare the sql statement:
        $sqlquery = $connect->prepare("
        INSERT INTO chat
        (full_name, email, reason, other_reason) 
        VALUES (?,?,?,?)");

        $sqlquery->bind_param("ssss",$full_name, $email, $reasonSelect, $otherReason); //Bind the parameters:
        $sqlquery->execute(); //Execute the statement:

        if ($sqlquery->affected_rows > 0) { //If the connection is made and the data is inserted into the database, execute the following:

            //Create a new instance of phpmailer: 
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

                //Customising the content of the email based on the what the user has selected:
                if($reasonSelect === "I don't know how to set up my Aquabot"){ //Provide an email on how to set up the Aquabot:
                    //Specifying the content of the email:
                    $mail->isHTML(true);
                    $mail->Subject = 'Setting up your Aquabot';
                    $mail->Body    = "
                    Dear $full_name,
                    <br><br>Thank you for contacting us about setting up your Aquabot.
                    <br><br>Please see the document attached below on how to set up your Aquabot.<br>
                    <br>If you have any issues, please let us know.
                    <br><br>Thanking you,
                    <br>The GreenTech Resolutions Team";
                }
                elseif($reasonSelect === "My system stopped working"){ //Provide a phone number or address for where they can take the system to be fixed:
                    //Specifying the content of the email:
                    $mail->isHTML(true);
                    $mail->Subject = 'System stopped working';
                    $mail->Body    = "
                    Dear $full_name,
                    <br><br>Thank you for contacting us about your system not working.
                    <br><br>Please let us know in detail what issues you are encountering with your Aquabot.<br>
                    <br><br>Alternatively, you can phone the following phone number +27746149038 or visit our main branch located at 9 Concorde E Rd, Bedfordview Johannesburg for further assistance.<br>
                    <br>If you have any other questions, please let us know.
                    <br><br>Thanking you,
                    <br>The GreenTech Resolutions Team";
                }
                elseif($reasonSelect === "I want to become a supplier for GreenTech Resolutions"){ //Provide a document for users to fill if they want to become a supplier:
                    //Specifying the content of the email:
                    $mail->isHTML(true);
                    $mail->Subject = 'Becoming a supplier';
                    $mail->Body    = "
                    Dear $full_name,
                    <br><br>We are glad to hear that you want to work with us!
                    <br><br>Please fill out the document attached below so that we can get into contact with you.<br>
                    <br>If you have any other questions, please let us know.
                    <br><br>Thanking you,
                    <br>The GreenTech Resolutions Team";
                }
                else{ //Generic email for when the user selects Other:
                    //Specifying the content of the email:
                    $mail->isHTML(true);
                    $mail->Subject = 'Contact Request';
                    $mail->Body    = "
                    Dear $full_name,
                    <br><br>Thank you for reaching out to us!
                    <br><br>One of our consultants will contact you soon.<br>
                    <br>If you have any other questions, please let us know.
                    <br><br>Hoping to hear from you soon,
                    <br>The GreenTech Resolutions Team";
                }

                //Sending the email to the user:
                $mail->send();

                //Generating a success message to the user:
                echo '<script>alert("Your chat request has been sent! Please check your email for a message.")</script>';
                header("Refresh:1; url=chat.php"); //Redirect to the chat page:
                exit;
            }
            catch(Exception $e){ //If the email fails for any reason:
                echo '<script>alert("Error sending email. Please try again later.")</script>'; 
                header("Refresh:1; url=chat.php"); //Redirect to the chat page so that the user can try again:
                exit;
            }
        } else { //If the email fails for any reason:
            echo '<script>alert("Error sending email. Please try again later.")</script>'; 
            header("Refresh:1; url=chat.php"); //Redirect to the chat page so that the user can try again:
            exit;
        }
    }
?>
