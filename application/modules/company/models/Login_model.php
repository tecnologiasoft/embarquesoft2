<?php
class Login_model extends My_model 
{

    function __construct()
    {
        parent::__construct();
        $this->utc_time = time();
        $this->output->enable_profiler(FALSE);
    }


    function login($post)
	{        
		
		$this->db->select("u.*,r.modules");
		$this->db->from('user u');
		$this->db->where('u.username',$post['username']);
		$this->db->where('u.password',md5($post['password']));
		$this->db->where('u.company_id',$post['company_id']);
		//$this->db->where('u.type',$post['type']);
		$this->db->where('u.status','1');
		$this->db->join('rights r', 'u.id = r.user_id','left');
		$this->db->limit(1);
		$query = $this->db->get();
		

		
		
		if($query->num_rows() == 1)
		{
			$row = $query->row();

			
			
			$this->session->set_userdata('userdata',$row);
			
			
	 
			return true;  
		}
		else
		{
			return false;
		}
	}  


}//class ends

?>