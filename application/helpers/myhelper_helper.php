<?php
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function token()
{
    return md5(bin2hex(openssl_random_pseudo_bytes(32)) . time());

}

function checkInt($value)
{
    $CI = &get_instance();
    $ids = $CI->utility->decode($value);

    if (!ctype_digit($ids)) {

        echo $ids;
        die;
        redirect(SITE_URL . 'logout');
        die;

    } else {

        return $ids;
    }
}

function apiResponse($res)
{

    
    echo json_encode($res);
    die;
}

/*Commonly upload all type of file*/

function upload_file($file, $image_name, $path)
{
    $CI = &get_instance();

    $return['error'] = '';
    $config['upload_path'] = $path;
    $config['allowed_types'] = '*';
    $config['file_name'] = $image_name;

    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);

    if (!$CI->upload->do_upload(key($file))) {
        apiResponse([ERROR_CODE, $CI->upload->display_errors()]);
    } else {
        $result = $CI->upload->data();
        $return['data'] = $result;
    }

    return $return;
}


function local_time($Date_Time,$format='h:i A'){

    if($Date_Time=="" || $Date_Time == '00:00:00'){
        return $Date_Time;
    }
    date_default_timezone_set('UTC');

    $ci = & get_instance();
    
    $User_time_Zone = $ci->session->userdata('web_timezone');

    $LocalTime_start_time = new DateTime( $Date_Time );
    $tz_start = new DateTimeZone( $User_time_Zone );
    $LocalTime_start_time->setTimezone( $tz_start );
    $start_date_time = (array) $LocalTime_start_time;
    
    
    return date($format,strtotime($start_date_time['date']));
    
    
    
     
}


function country_dropwon($val = ""){
    $ci = & get_instance();
?>
  <select class  = "form-control m-input" name="country" id="country">
        <option value = ""><?php echo $ci->lang->line('label_country'); ?></option>
        <option value = "100" <?php echo $val == '100' ? "selected":"" ?>><?php echo $ci->lang->line('label_united_state'); ?></option>
        <option value = "101" <?php echo $val == '101' ? "selected":"" ?>><?php echo $ci->lang->line('label_dominican_republic'); ?></option>
  </select>
  <?php
   echo form_error('country');

    
}

function print_history($array){
    if($array['is_update'] == 'false'){
    echo $array[key($array)];
    }else{
        echo '<span class = "text-danger">'.$array[key($array)].'</span>';
    }
    

}
