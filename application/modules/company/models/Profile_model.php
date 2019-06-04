<?php
class Profile_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->utc_time = time();
        $this->output->enable_profiler(FALSE);        
    }
//Profile Model Start
/*=============================================================================================================================
            Get User Data
=============================================================================================================================*/

    function get_user_data($user_id)
    {
        $this->db->select("u.id as user_id,u.*,
                CONCAT('".base_url().USER_IMAGE_THUMB."','',profile_image) as vendor_image_thumb,
                CONCAT('".base_url().USER_IMAGE."','',profile_image) as vendor_image");
        $this->db->from('tbl_user u');
        
        $this->db->where('u.id', $user_id); 
        $this->db->where('u.role','vendor');
        $this->db->where('u.is_active',1);
        $this->db->limit(1);   
        $query = $this->db->get();
        
        if($query->num_rows() >= 1)
        {
            return $query->row_array();
        }
        else
        {
            return false;
        }
    }

    function get_user_vendor_data($user_id)
    {
        $this->db->select("c.*,CONCAT('".base_url().STOER_IMAGE_THUMB."','',logo) as store_image_thumb,
                CONCAT('".base_url().STORE_IMAGE."','',logo) as store_image");
        $this->db->from('tbl_category_details c');
        
        $this->db->where('c.vendor_id', $user_id);  
        $this->db->where('c.is_active',1);
        $this->db->limit(1);   
        $query = $this->db->get();
        
        if($query->num_rows() >= 1)
        {
            return $query->row_array();
        }
        else
        {
            return false;
        }
    }


    function update_personal_details($user_id,$data)
    {
        
        $this->db->where('id', $user_id); 
        $this->db->where('role','vendor');
        $this->db->where('is_active',1);
        $this->db->update('tbl_user', $data);
        return $this->db->affected_rows();
    }

    function update_vendor_details($user_id,$data)
    {
        $this->db->where('vendor_id', $user_id);
        $this->db->where('is_active',1);
        $this->db->update('tbl_category_details', $data);
        return $this->db->affected_rows();
    }


// Profile Model End

}
?>