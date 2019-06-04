<?php
class Deshboard_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    /*Get active user*/
    function active_user()
	{        
        $this->db->where('status', 'Active');
        $this->db->from('tbl_user');
        return $this->db->count_all_results();        
	}

    /*Get inactive user*/
	function inactive_user()
	{        
        $this->db->where('status', 'Inactive');
        $this->db->from('tbl_user');
        return $this->db->count_all_results();        
	}  

    /*Get active merchant*/
	function active_merchant()
	{
        $this->db->from('tbl_merchant');
        $this->db->where('status', 'Active');
        return $this->db->count_all_results();
	}

    /*Get inactive merchant*/
	function inactive_merchant()
	{
        $this->db->from('tbl_merchant');
        $this->db->where('status', 'Inactive');
        return $this->db->count_all_results();
	}

    /*Get not verified merchant*/
	function not_verify_merchant()
	{
        $this->db->from('tbl_merchant');
        $this->db->where('is_verified', 'Unverified');
        return $this->db->count_all_results();
	}

    /*Get month wise user registration*/
	function month_vise_user($from,$to)
	{
        $this->db->from('tbl_user');
		$this->db->where('DATE(insertdate) >=',$from);
        $this->db->where('DATE(insertdate) <=',$to);
        return $this->db->count_all_results();
	}

    /*Get month wise merchant registration*/
	function month_vise_merchant($from,$to)
	{
        $this->db->from('tbl_merchant');
		$this->db->where('DATE(insertdate) >=',$from);
        $this->db->where('DATE(insertdate) <=',$to);
        return $this->db->count_all_results();
	}

}
?>