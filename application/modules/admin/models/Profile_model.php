<?php
class Profile_model extends CI_Model 
{

    function __construct()
    {
        parent::__construct();
        $this->utc_time = time();
        $this->output->enable_profiler(FALSE);
    }

    /*Get admin data*/
    function get_admin_data($id)
	{        
		$this->db->select("*,CONCAT('".base_url().ADMIN_IMAGE_THUMB."','',profile_image) as admin_profile_image");
		$this->db->from('tbl_admin');
		$this->db->where('id', $id);
        $this->db->where('role','S');
        $this->db->where('status', 'Active');
		$this->db->limit(1);
		$query = $this->db->get();
        //echo $this->db->last_query();die;
		if($query->num_rows() == 1)
		{
            $row = $query->row_array();

            return $row;
		}
		else
		{
			return false;
		}
	}  

    /*Update admin profile*/
    function update_personal_details($user_id,$data)
    {
        $this->db->where('id', $user_id); 
        $this->db->where('status', 'Active');
        $this->db->update('tbl_admin', $data);
        return $this->db->affected_rows();
    }

}
?>