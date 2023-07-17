<?php
    require 'vendor/autoload.php';

    //Using the database configuration file:
    require_once('db_config.php');

    if (isset($_POST['contact_us_submit'])){
        
        //Getting the data from the contact us form:
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $comments = $_POST['comments'];

        //Configuring the SMTP server settings:
        $smtp_server = 'smtp.gmail.com'; //Using gmail
        $smtp_port = 587; //Using a specific port number
        $smtp_username = 'seansmith23lightsout@gmail.com'; //Email address that will be used to send the welcoming message emails
        $smtp_password = 'elgnklavadzuatze'; //App password that was generated for gmail so that the email address can be used by other programs.
            
    //Creating a connection to the database:
    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        
        if (!$connect) { //If the connection fails, display an error:
            die("Connection failed!" . mysqli_connect_error());
        }
            
        //Checking if the user with this email already exists:
        $sqlquery =$connect->prepare("
        SELECT 
        * 
        FROM 
        contact_us 
        WHERE 
        email=?");

        $sqlquery->bind_param("s",$email); //Bind the parameter:
        $sqlquery->execute(); //Execute the statement:
        $result = $sqlquery->get_result(); //Get the result:
        $num_rows = $result->num_rows; //Store the number of rows found:
        
        if ($num_rows > 0) { //If an entry of that email is found display an error message
            echo '<script>alert("Error. You have already contacted us with this email address. Please try again.")</script>';
            header("Refresh:1; url=contact_us.php"); //Redirect user to the registration page
            exit;

        } else { //If an entry of that email is not found insert the user into the database:

            $sqlquery = $connect->prepare("
            INSERT INTO contact_us
            (full_name, email, comments) 
            VALUES (?,?,?)");

            $sqlquery->bind_param("sss",$full_name, $email, $comments); //Bind the parameters:
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
                    $mail->Subject = 'Contact Request';
                    $mail->Body    = "
                    Dear $full_name,
                    <br><br>Thank you for contacting us!
                    <br><br>You can contact us through the following:<br>
                    <br><br>Email:
                    <br><br>Phone Number:
                    <br><br>Physical Address: <br><br>
                    Hoping to hear from you soon,
                    <br>The GreenTech Resolutions Team";

                    //Sending the email to the user:
                    $mail->send();

                    //Generating a success message to the user:
                    echo '<script>alert("Your contact request has been sent! Please check your email.")</script>';
                    header("Refresh:1; url=contact_us.php"); 
                    exit;
                }
                catch(Exception $e){ //If the email fails for any reason:
                    echo '<script>alert("Error sending email 1. Please try again later.")</script>'; 
                    header("Refresh:1; url=contact_us.php"); //Redirect to the contact us page so that the user can try again:
                    exit;
                }
            } else { //If the email fails for any reason:
                echo '<script>alert("Error sending email 2. Please try again later.")</script>'; 
                header("Refresh:1; url=contact_us.php"); //Redirect to the contact us page so that the user can try again:
                exit;
            }
        }  
    }
?>
