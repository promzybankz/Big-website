<?php

require_once "phpmailer/PHPMailerAutoload.php";

class User
{

    public $done, $errmsg;

    public function sanitize($var)
    {
        $var = stripslashes($var);

        $var = strip_tags($var);

        trim($var);

        $var = htmlentities($var);

        return $var;
    }

    public function validator($userarr){
        if (!empty($userarr['name']) && !empty($userarr['email']) && !empty($userarr['phone']) && !empty($userarr['schname'])&& !empty($userarr['schaddress']) && !empty($userarr['schposition'])) {
            
           

            $this->sendmail($userarr);

            
        
        }else {
             //Update Error Message on Error
            $this->errmsg = "All Fields must be filled";
        }
    }


    public function sendmail($userarr)
    {
        $useremail = $this->sanitize($userarr["email"]);
        $name = $this->sanitize($userarr["name"]);
        $phone = $this->sanitize($userarr["phone"]);
        $schoolname = $this->sanitize($userarr["schname"]);
        $schooladdress = $this->sanitize($userarr["schaddress"]);
        $schoolposition = $this->sanitize($userarr["schposition"]);

        $adminemail = "registrations@binarygenerationlabs.com";
        
        try {
            $mail = new PHPMailer(true);
            
            // Host can be gotten from the Mail Details in the Hosting Service

            $mail ->Host='mail.binarygenerationlabs.com';
            $mail ->isSMTP();
            $mail ->Port=465;
            $mail ->SMTPAuth = true;
            //$mail ->SMTPDebug = 2;

            //Username and password Should be Created in the Mail page of your cpanel Dashboard
            $mail ->Username='registrations@binarygenerationlabs.com';
            $mail ->Password='BinaryLabs$Registrations';
            $mail ->SMTPSecure ='ssl';

            //Set From should be From a Created Email Account from your Hosting Cpanel
            $mail ->setFrom("registrations@binarygenerationlabs.com", "Binary Labs");
            $mail ->addAddress("{$adminemail}");
        
            $mail ->isHTML(true);
            $mail ->Subject = "New Entry at BinaryGenerationLabs";

            $mail->Body =<<<eBody
            
            <div style="background-color: rgb(248, 248, 248);padding:10px;text-align:center">                
                
                <div style="background-color: white;padding:5px;border-top:3px solid #263056;font-size:15px;text-align: left;">
                   <p>BinaryGenerationLabs Register Form Just Received one Entry. The Details of the entry are</p>

                   <p>Name : <b>$name</b></p>
                   <p>Email : <b>$useremail</b></p>
                   <p>Phone : <b>$phone</b></p> 
                   <p>School Name : <b>$schoolname</b></p>
                   <p>School Address : <b>$schooladdress</b></p>
                   <p>Position in School : <b>$schoolposition</b></p>

                </div>

                <div class="footer" style="text-align:center; margin-top:40px; color:grey">
                    BinaryGenerationLabs
                </div>


            </div>      
eBody;
            //$mail ->AltBody = "Please Enable HTML Email!";
        
            if (!$mail->send()) {
                echo "Not sent".$mail->ErrorInfo;
                $this->errmsg = $mail->ErrorInfo;
            } else {
                //Return Message on Succesful Registrations

                $this->done = "School has been Registered Successfully";
            }
        } catch (Exception $e) {
            echo "Could Not Send Mail.<br> Check Your Internet Connection<br>". $e->getMessage();
        }
    }

    public function partnering($userarr){

        $pemail = $this->sanitize($userarr["pemail"]);
        $pname = $this->sanitize($userarr["pname"]);
        $pphone = $this->sanitize($userarr["pphone"]);
        $pmessage = $this->sanitize($userarr["pmessage"]);


        $adminemail = "hi@binarygenerationlabs.com";
        
        try {
            $mail = new PHPMailer(true);
            
            // Host can be gotten from the Mail Details in the Hosting Service

            $mail ->Host='mail.binarygenerationlabs.com';
            $mail ->isSMTP();
            $mail ->Port=465;
            $mail ->SMTPAuth = true;
            //$mail ->SMTPDebug = 2;

            //Username and password Should be Created in the Mail page of your cpanel Dashboard
            $mail ->Username="$adminemail";
            $mail ->Password='BinaryLabs$';
            $mail ->SMTPSecure ='ssl';

            //Set From should be From a Created Email Account from your Hosting Cpanel
            $mail ->setFrom("$adminemail", "Binary Labs");
            $mail ->addAddress("{$adminemail}");
        
            $mail ->isHTML(true);
            $mail ->Subject = "New Entry at BinaryGenerationLabs";

            $mail->Body =<<<eBody
            
            <div style="background-color: rgb(248, 248, 248);padding:10px;text-align:center">                
                
                <div style="background-color: white;padding:5px;border-top:3px solid #263056;font-size:15px;text-align: left;">
                   <p>BinaryGenerationLabs Partner's Form Just Received one Entry. The Details of the entry are</p>

                   <p>Name of Partner: <b>$pname</b></p>
                   <p>Email of Partner : <b>$pemail</b></p>
                   <p>Phone : <b>$pphone</b></p> 
                   <p>Partner's Message : <b>$pmessage</b></p>

                </div>

                <div class="footer" style="text-align:center; margin-top:40px; color:grey">
                    BinaryGenerationLabs
                </div>


            </div>      
eBody;
            //$mail ->AltBody = "Please Enable HTML Email!";
        
            if (!$mail->send()) {
                echo "Not sent".$mail->ErrorInfo;
                $this->errmsg = $mail->ErrorInfo;
            } else {
                //Return Message on Succesful Registrations

                $this->done = "School has been Registered Successfully";
            }
        } catch (Exception $e) {
            echo "Could Not Send Mail.<br> Check Your Internet Connection<br>". $e->getMessage();
        }
    }
}

?>