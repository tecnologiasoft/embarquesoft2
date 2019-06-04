<?php
class Login_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
        $this->utc_time = time();
        $this->output->enable_profiler(FALSE);
    }


    function login($email, $password)
	{        
		$this->db->select("*,CONCAT('".base_url().ADMIN_IMAGE_THUMB."','',profile_image) as profile_image");
		$this->db->from('tbl_admin');
		$this->db->where('email', $email);
		$this->db->where('password',$this->common->AES_encrypt($password));
        $this->db->where('role','S');
        $this->db->where('status','Yes');
		$this->db->limit(1);
		$query = $this->db->get();
        // echo $this->db->last_query();die;
		if($query->num_rows() == 1)
		{
            $row = $query->row();
            return $row;
		}
		else
		{
			return false;
		}
	}  


}//class ends

?>