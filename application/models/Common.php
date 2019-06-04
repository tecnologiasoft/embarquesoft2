<?php
error_reporting(E_ERROR);

class Common extends CI_Model
{
    function __construct()
    {
        parent::__construct();
       
        $this->valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP","mov", "mpg", "flv","webm", "mp4", "ogv", "3gp", "mkv","m4v");
        $this->photo_valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
        $this->video_valid_formats = array("mov", "mpg", "flv","webm", "mp4", "ogv", "3gp", "mkv","m4v");
    }

    /*
     * Validate user header token
    */
    function validate_header_token($response_obj)
    {
        $this->post_body_decrypt();

        //Get request API method name
        $methodname = $this->router->fetch_method();

        $method_array = array("signup", "login", "forgot_password","push_test","verification","check_update_api");
        if (!in_array($methodname, $method_array)) 
        {
            $header_token = $this->input->get_request_header("TOKEN",TRUE);
            
            //Check token in tbl_users_token
            $token_count = $this->db->get_where('tbl_user_device',array('token'=>$header_token) );

            if( ($token_count->num_rows() <= 0))
            {   
                $message = ['code' => "-1", 'message' => "Invalid token","data"=>""];
                $response_obj->response($message, REST_Controller::HTTP_UNAUTHORIZED); // HTTP_UNAUTHORIZED (401)
            }
            else
            {
                $row = $token_count->row_array();
                return $row['user_id'];
            }
        }
    }

    /*
     * Decrypt body post data
     */
    function post_body_decrypt()
    {
        $contents = file_get_contents('php://input');
        $params = (array)json_decode(trim($this->AES_decrypt($contents)));
        $_POST = '';
        /*echo "<pre>";
        print_r($params);die();*/
        foreach ($params as $key => $value) 
        {
            if ($value!= '')
            {
                $_POST[$key] = trim($value);
            }
        }
    }

    /*
     * AES encrypt plain text data
     */
    function AES_encrypt($plaintext)
    {
        
        
        
        
        $plaintext_utf8 = utf8_encode($plaintext);
        

        $cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', IV);
        
        $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, KEY_256, $plaintext_utf8, MCRYPT_MODE_CBC,IV);
        
        

        $encrypt = base64_encode($ciphertext);

        return $encrypt;
    }

    /*
     * AES decrypt cipher text data
     */
    function AES_decrypt($ciphertext)
    {
        $decrypt = mcrypt_decrypt(MCRYPT_RIJNDAEL_128,KEY_256, base64_decode($ciphertext), MCRYPT_MODE_CBC, IV);

        return $decrypt;
    }
    
    /*Generate user token*/
    function generate_token($user_id)
    {
        $sessid = '';
        while (strlen($sessid) < 32)
        {
            $sessid .= mt_rand(0, mt_getrandmax());
        }

        $sessid .= $_SERVER['REMOTE_ADDR'];
        $token = md5(uniqid($sessid, TRUE));

        /* Update or insert session */
        $check_session = $this->db->get_where('tbl_user_device',array('user_id'=>$user_id) )->num_rows();
        if($check_session <= 0)
        {
            /*Insert user session details*/
            $params = array(
                'token' => $token,
                'user_id' => $user_id
            );
            $this->db->insert('tbl_user_device', $params);
        }
        else
        {
            /* update session deatils */
            $params = array(
                'token' => $token
            );

            $this->db->where('user_id', $user_id);
            $this->db->update('tbl_user_device', $params);
        }

        return $token;
    }

    /*Upload image*/
    function image_upload($field,$path)
    {
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $filename = $config['file_name'] = strtotime(date("Ymd his"));
        //$config['max_size'] = '2048KB';
        //$config['max_width']  = '2000';
        //$config['max_height']  = '2000';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload($field))
        { 
            $w = $this->upload->data();
            $image_name = $w['file_name'];
            $config = array(
            'image_library'  => 'gd2',
            'new_image'      => $path.'thumb/',
            'source_image'   => $path.$w['file_name'],
            'create_thumb'   => false,    
            'width'          => "350",
            'height'         => "350",
            'maintain_ratio' => TRUE,
            );
            $this->load->library('image_lib'); // add liberary
            $this->image_lib->initialize($config);
            $this->image_lib->resize();

            return $image_name;
        }
        else
        {
            return false;
        }
    }

    /* S3 Image Upload */
    function image_upload_S3($field,$path,$field1,$path1)
    {
        $tmp=explode('.',$_FILES[$field]['name']);
        $ext = end($tmp);
        
        if(in_array($ext,$this->valid_formats))
        {
            $image_name    = uniqid().strtotime(date("Ymd his")) .".". $ext;

            try 
            {
                $this->s3->putObject([
                    'Bucket'    => $this->s3val['s3']['bucket'],
                    'Key'       => $path.$image_name,
                    'SourceFile' => $_FILES[$field]['tmp_name'],
                    'ServerSideEncryption' => 'AES256',
                    //'Body'        => fopen($temp_name, 'rb'),
                    'ACL'       => 'public-read'
                ]);

                $this->s3->putObject([
                    'Bucket'    => $this->s3val['s3']['bucket'],
                    'Key'       => $path1.$image_name,
                    'SourceFile' => $_FILES[$field1]['tmp_name'],
                    'ServerSideEncryption' => 'AES256',
                    //'Body'        => fopen($temp_name, 'rb'),
                    'ACL'       => 'public-read'
                ]);

                return $image_name;
            } 
            catch (S3Exception $e) 
            {
                return false;
            }
        }
        else
        {
            return false;
        }

    }

    /*Upload media file*/
    function media_upload_S3($field,$path)
    {
        $tmp=explode('.',$_FILES[$field]['name']);
        $ext = end($tmp);
        
        if(in_array($ext,$this->valid_formats))
        {
            $image_name    = uniqid().strtotime(date("Ymd his")) .".". $ext;

            try 
            {
                $this->s3->putObject([
                    'Bucket'    => $this->s3val['s3']['bucket'],
                    'Key'       => $path.$image_name,
                    'SourceFile' => $_FILES[$field]['tmp_name'],
                    'ServerSideEncryption' => 'AES256',
                    //'Body'        => fopen($temp_name, 'rb'),
                    'ACL'       => 'public-read'
                ]);

                return $image_name;
                
            } 
            catch (S3Exception $e) 
            {
                return false;
            }
        }
        else
        {
            return false;
        }

    }

    /*Generate random string*/
    function RandomString($length)
    {
        $keys = array_merge(range(0,9), range('a', 'z'),range('A','Z'));
        $key='';
        for($i=0; $i < $length; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

    /*Generate rendom number*/
    function RandomInteger($length)
    {
        $keys = array_merge(range(0,9));
        $key='';
        for($i=0; $i < $length; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

    /*Get settings value*/
    function getSettingsValue($attribute_name)
    {
        $this->db->select('*');
        $this->db->from('tbl_setting_details');
        $this->db->where('attribute_name', $attribute_name);
        $query = $this->db->get();      

        if($query->num_rows() > 0)
        {   
            $row = $query->row_array();
            return $row['attribute_value'];
        }
        else
        {
            return false;
        }
    }

    /*Get settings details*/
    function getSettingsdetails()
    {
        $this->db->select('*');
        $this->db->from('tbl_setting_details');
        $query = $this->db->get();      

        if($query->num_rows() > 0)
        {   
            $settings_data = array();
            foreach ($query->result_array() as $settingskey => $settingsvalue) 
            {
                $settings_data[$settingsvalue['attribute_name']] = $settingsvalue['attribute_value'];
            }
            return $settings_data;
        }
        else
        {
            return false;
        }
    }

    /*Ge total company counts*/
    function company_count()
    {
        $this->db->from('tbl_company');
        return $this->db->count_all_results();
    }
    
    /*Get all main category*/
    function category_list()
    {
        $this->db->select("*");
        $this->db->from('tbl_category');
        $this->db->where('parent_id','0');
        $this->db->where('status','Active');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if($query->num_rows() >= 1)
        {  
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }

    /*Get all sub category*/
    function subcategory_list($category_id)
    {
        $this->db->select("*");
        $this->db->from('tbl_category');
        $this->db->where('parent_id', $category_id);
        $this->db->where('status','Active');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if($query->num_rows() >= 1)
        {  
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }

    /*
     * Check merchant activation url and token
     */
    function check_merchant_activation_url_expire($merchant_id, $activation_token)
    {   
        $current_time = date('Y-m-d H:i:s', strtotime('-1 day'));
        $sql = "SELECT * FROM tbl_merchant WHERE id = '".$merchant_id."' AND activation_token LIKE '".$activation_token."' AND activation_date >= '".$current_time."'";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
        {
            return $query->row_array();
        }
        else
            return array();
    }

    ///////////////////////// Start Mail Section //////////////////////
    /*
     * Send Sign up mail for new merchant
    */
    function merchant_signupMail($merchant_data)
    {   
        /*Get settings details*/
        $settings = $this->getSettingsdetails();
        echo "<pre>";print_r($settings);die;
        $this->email->from(ADMIN_EMAIL, 'Admin');
        $this->email->to($merchant_data['email']);
        $this->email->subject('Welcome To '.APP_NAME.' Application');

        $message = $this->load->view('emails/activation_email', $merchant_data, TRUE);
        $this->email->message($message);

        $this->email->set_mailtype("html");
        $this->email->set_header('X-Priority', '1');
        $this->email->set_header('From', ADMIN_EMAIL);
        
        if($this->email->send())
            return true;
        else
            return false;
    }

    /*Send gcm notification*/
    function send_gcm_notification($registatoin_ids, $message) 
    {         
        //print_r($registatoin_ids."  ".$message);
        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
 
        $fields = array(
            'registration_ids' => array($registatoin_ids),
            'data' => array("message" => $message)
        );
        
        $headers = array(
            /*'Authorization: key=AIzaSyDdFk8eHIOcem2x67vDLaGgnUn9shNAhIE',*/
            'Authorization: key='.ANDROID_PUSH_KEY,
            'Content-Type: application/json'
        );
        //print_r($headers);
        // Open connection
        $ch = curl_init();
 
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
 
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        //var_dump($result);
        // Close connection
        curl_close($ch);
        return $result;
    }

    /*Send notification in ios*/
    function send_notification_ios($payload,$device_tokens)
    {   
        $development = true;
        $Production = true;
        $payload = json_encode($payload);
        
        $apns_url = NULL;
        $apns_cert = NULL;

        $apns_url1 = NULL;
        $apns_cert1 = NULL;

        $apns_port = 2195;
        
        if($development)
        {
            $apns_url = 'gateway.sandbox.push.apple.com';
            $apns_cert = IOS_PEM_DEVELPMENT;
            
            //print_r($apns_cert);
            
            $stream_context = stream_context_create();
            stream_context_set_option($stream_context, 'ssl', 'local_cert', $apns_cert);
            stream_context_set_option($stream_context, 'ssl', 'passphrase',"hyperlink");
            
            $apns = stream_socket_client('ssl://' . $apns_url . ':' . $apns_port, $error, $error_string, 2, STREAM_CLIENT_CONNECT, $stream_context);
            
            if (!$apns) {
                //print "Failed to connect \n";
                //exit;
                $success_connection = 0;
            } else {
                //echo "ok";
                $success_connection = 1;
            }

            if($device_tokens )
            {
                $apns_message = chr(0) . pack('n', 32) . pack('H*', str_replace(' ', '', $device_tokens)) . pack('n', strlen($payload)) . $payload;
                fwrite($apns, $apns_message);
                //var_dump($apns_message);die();
            }
        }
        /*----------Production--------------*/
        if($Production)
        {
            $apns_url1 = 'gateway.push.apple.com';
            $apns_cert1 = IOS_PEM_DISTRIBUTION;
            
        
            //print_r($apns_cert1);
            $stream_context1 = stream_context_create();
            stream_context_set_option($stream_context1, 'ssl', 'local_cert', $apns_cert1);
            stream_context_set_option($stream_context1, 'ssl', 'passphrase',"hyperlink");
            
            $apns1 = stream_socket_client('ssl://' . $apns_url1 . ':' . $apns_port, $error, $error_string, 2, STREAM_CLIENT_CONNECT, $stream_context1);
            
            if (!$apns1) {
                //print "Failed to connect \n";
                //exit;
                $success_connection = 0;
            } else {
                //echo "ok";
                $success_connection = 1;
            }
            

            if($device_tokens )
            {
                $apns_message = chr(0) . pack('n', 32) . pack('H*', str_replace(' ', '', $device_tokens)) . pack('n', strlen($payload)) . $payload;
                fwrite($apns1, $apns_message);
                //var_dump($apns_message);die();
            }
        }
        @socket_close($apns);
        @fclose($apns);
        return;
        // END CODE FOR PUSH NOTIFICATIONS TO ALL USERS
    }
    
    /*
     * Get menu action
     */
    function get_menu($menu)
    {
        $menuname= "";
        $filename = $this->uri->segment(2);
        if($filename == $menu)
        {
            $menuname = "m-menu__item--active";
        }/*
        else
        {
            $menuname = "has-submenu";
        }*/
        return  $menuname;
    }

    /*
     * Get counters of table
     */
    function record_count($tbl_name){
        $this->company_db->from($tbl_name);
        return $this->company_db->count_all_results();
    }

    /* Date convert on specific timezone */
    function from_date_convert($date, $from_timezone, $to_timezone, $dateformat) {
        if($date == '0000-00-00 00:00:00')
            return $date;
        $date = new DateTime($date, new DateTimezone($from_timezone));
        $date->setTimezone(new DateTimeZone($to_timezone));

        return $date->format($dateformat);
    }

     /**
    * Send invoice pdf to email address
    */
    function send_email_pdf($data)
    {   
        
        return true;
        $this->load->library('email'); 
        
        $this->load->helper('path');

        $this->email->from($data['from'], $data['from_name']);
        $this->email->to($data['to']); 
     
        $this->email->subject($data['subject']);
        $this->email->message($data['message']); 

        /* This function will return a server path without symbolic links or relative directory structures. */
        /*$path = set_realpath('uploads/pdf/');*/

        $this->email->attach($data['attachment']);  /* Enables you to send an attachment */


        if($this->email->send())
            return true;
        else
            return false;
    }
}