<?php

//PHP MAILER
            
            function smtp_mailer($to,$subject, $msg,$_code,$intern,$intern_id){
                
                $br1 = '<br>';
                $menName = 'MENTOR NAME : ';
                $combined1 = $menName.$intern;
                $br2 = '<br>';
                $menEmail = 'MENTOR EMAIL : ';
                $combined2 = $menEmail.$intern_id;
                $combined = $msg.$_code.$br1.$combined1.$br2.$combined2;
                $default = '
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
                
                Thanks & Regards,<br>
                The BIT HACK Team <br>
                Bannari Amman Institute of Technology <br>
                Sathyamangalam-638 401 <br>
                Erode District, Tamilnadu <br>
                Ph: 04295-226122, 226123';
                $toCombined = $combined.$default;
                $mail = new PHPMailer(); 
                $mail->IsSMTP(); 
                $mail->SMTPAuth = true; 
                $mail->SMTPSecure = 'tls'; 
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587; 
                $mail->IsHTML(true);
                $mail->CharSet = 'UTF-8';
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER; 
                $mail->Username = "mohamedimthiyaz.it19@bitsathy.ac.in";
                $mail->Password = "ckhaxckhrfinocch";
                $mail->SetFrom("mohamedimthiyaz.it19@bitsathy.ac.in","MOHAMED IMTHIYAZ");
                $mail->Subject = $subject;
                $mail->Body = $toCombined;
                $mail->AddAddress($to);
                $mail->SMTPOptions=array('ssl'=>array(
                    'verify_peer'=>false,
                    'verify_peer_name'=>false,
                    'allow_self_signed'=>false
                ));
                if(!$mail->Send()){
                    echo $mail->ErrorInfo;
                }else{
                    
                    header("Location: .././Profile/profile.php#doom");
                }
            }

            echo smtp_mailer($email,'BIT HACK','Successfully registered for problem statement - ',$problem_code,$intern,$intern_id);
            
?>