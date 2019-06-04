<?php
class Main_model extends My_model
{
    

    public function __construct()
    {
        
        parent::__construct();
    }

    public function maxId($table){
 
        $next = $this->company_db->query("SHOW TABLE STATUS LIKE '$table'");
        $next = $next->row(0);
        return $next->Auto_increment;
    }

     public function updateCompanyRefIds($column,$val){
 
        
        
        $this->company_db->limit('1');
        $this->company_db->where($column,'0');
        $this->company_db->update('company_ref',[$column => $val]);
        
        if(!$this->company_db->affected_rows()){
            $this->company_db->insert('company_ref',[$column => $val]);
        }
        return true;
        

     }
  
      public function getUserInfo($data = ""){

        $data['select'] = ['*'];
        $data['table'] = 'tbl_user';
        
        $response = $this->selectRecords($data);
        
        return count($response) == 1 ? $response[0] : $response;

      }
  public function getHistory($tbl,$id){
    $data['select'] = ['*'];
    $data['table'] = 'tbl_history';
    $data['where'] = ['tbl' => $tbl,'primery_key' => $id];
    $response = $this->selectRecords($data);
    return $response;
  }


  public function getType($type){

      $data['select'] = ['*'];
      $data['table'] = 'common_type';
      $data['where'] = ['type' => $type,'void' => '0'];
      $return = $this->selectRecords($data);

      return $return;

  }
}

