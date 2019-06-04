<?php
class Login_model extends CI_model
{
    

    public function __construct()
    {
        
        parent::__construct();
    }

    public function checkUserLogin($post){
        //$where = ['company_id' => $post['company_id']]

        $this->db->select('u.*,r.modules');
        $this->db->from('user u');
        $this->db->where('u.company_id',$post['company_id']);
        $this->db->where('u.username',$post['username']);
        $this->db->where('u.password',md5($post['password']));
        $this->db->where('u.type',PORTAL_USER);
        $this->db->join('rights r', 'u.id = r.user_id','left');
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

}
