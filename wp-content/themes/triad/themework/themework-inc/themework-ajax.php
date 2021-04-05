<?php
/**
 * ---------------------------
 * Ajax: Online Application
 * ---------------------------
 * 
 */
if(!function_exists('online_application_ajax'))
{
    
    function online_application_ajax()
    {   
        $general = new General();
        $resp_arr = [
            'flag' => false,
            'msg' => '',
            'url' => ''
        ];
        global $wpdb;
        
        //$agent_pic = trim(strip_tags($_POST['agent_pic']));
        $name = trim(strip_tags($_POST['name']));
        $email = trim(strip_tags($_POST['email']));
        $phone = trim(strip_tags($_POST['phone']));
        $resume_url = trim(strip_tags($_POST['resume_url']));
        $your_message = trim(strip_tags($_POST['message']));
      
        //validation part
        $message = '';
        if(empty($email))
        {
            $message = __('Please enter your email', 'triad');            
        }  
        else if(!is_email($email))
        {
            $message = __('Please enter your valid email format', 'triad');            
        }
                
        // Update extra fields

        if ( ! function_exists( 'wp_handle_upload' ) ){
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
        }
            

        $uploadedfile = $_FILES['resume'];

        //print_r($uploadedfile['name']);exit();
        if ($uploadedfile['name'] != '') {
            $upload_overrides = array( 'test_form' => false );
        
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            
            if ( ! isset( $movefile['error'] ) ) {
            	$resume = $movefile['url'];
                $file_path = $movefile['file'];
            } else {
                $message = __($movefile['error'], 'triad');
            }
        }
        $wpdb->insert(APPLICATION_TBL, [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'resume_url' => $resume_url,
        'message' => $your_message,
        'resume' => $resume,
        'created_at' => gmdate('Y-m-d H:i:s'),
    	]);
        $from = 'no-reply@triadindiacastings.com'; 
        $fromName = 'triadindiacastings';
        $ccmail = 'mridha.26@gmail.com';
        $body_html = " 
            <h3>Thank You for Applying Job</h3> 
            <p>We're currently in the process of taking applications for this position. If you are selected to continue to the interview process, our human resources department will be in contact with you.</p>
        ";
        $mail = [
            $email,
            'Online Application',
            $body_html,
        ];
        $attachments = [
            $file_path
        ];
        $general->sendMail($mail,$attachments);
        
        $message = __('Application submitted successfully.', 'triad');
        $resp_arr['flag'] = true;
        //$resp_arr['url'] = AGENT_MICROSITE;

        
        $resp_arr['msg'] = $message;
        
        echo json_encode($resp_arr);
        exit;
    }
    
}