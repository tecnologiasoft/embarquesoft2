<?php
class My_model extends CI_Model
{
    public $datetime, $ip;

    public function __construct()
    {
        
        parent::__construct();
        
        $this->datetime = date("Y-m-d H:i:s");
        $this->ip = $this->input->ip_address();
        
    }

    public function selectRecords($data, $array = false)
    {
        $this->company_db->select($data ["select"]);
        $this->company_db->from($data ["table"]);
        
        if (isset($data ["where"])) {
            $this->company_db->where($data ["where"]);
        }
        
        if (isset($data ["where_or"])) {
            die("Please Use GROUP query for OR WHERE");
            //$this->company_db->or_where($data ["where_or"]);
        }
        
        if (isset($data ["or_where_in"])) {
            die("Please Use GROUP query for OR WHERE IN");
            /* foreach ($data ["or_where_in"] as $k => $v) {
                $this->company_db->or_where_in($k, $v);
            } */
        }
        
        if (isset($data ["where_in"])) {
            foreach ($data ["where_in"] as $k => $v) {
                $this->company_db->where_in($k, $v);
            }
        }
        
        if (isset($data ["like"])) {
            $this->company_db->like($data ["like"] [0], $data ["like"] [1], $data ["like"] [2]);
        }
        if (isset($data ["or_like"])) {
            die("Please Use GROUP query for OR LIKE");
            /* foreach ($data ["or_like"] as $k => $v) {
                $this->company_db->or_like($v [0], $v [1], $v [2]);
            } */
        }
        
        /* Handling GROUPING for Query */
        if (isset($data ["group"])) {
            $this->company_db->group_start();
            if (isset($data ["group"] ["like"])) {
                $this->company_db->like($data ["group"] ["like"] [0], $data ["group"] ["like"] [1], $data ["group"] ["like"] [2]);
            }
            if (isset($data ["group"] ["or_like"])) {
                foreach ($data ["group"] ["or_like"] as $k => $v) {
                    $this->company_db->or_like($v [0], $v [1], $v [2]);
                }
            }
            $this->company_db->group_end();
        }
        
        if (isset($data ["order"])) {
            $this->company_db->order_by($data ["order"]);
        }
        if (isset($data ["skip"])) {
            $this->company_db->limit($data ["limit"], $data ["skip"]);
        }
        elseif (isset($data ["limit"])) {
            $this->company_db->limit($data ["limit"]);
        }
        
        if (isset($data ["groupBy"])) {
            $this->company_db->group_by($data ["groupBy"]);
        }
        
        if ($array) {
            $result = $this->company_db->get()->result_array();
        }
        else {
            $result = $this->company_db->get()->result();
        }
       
        return $result;
    }

    public function insertRecord($data)
    {
        $result = false;
        if ($this->company_db->insert($data ["table"], $data ["insert"]) !== false) {
            $result = $this->company_db->insert_id();
        }
        
        return $result;
    }

    /* Inserts Batch Data */
    public function insertBatchRecord($data)
    {
        $result = false;
        if ($this->company_db->insert_batch($data ["table"], $data ["insert"]) !== false) {
            $result = $this->company_db->insert_id();
        }
        
        return $result;
    }

    public function updateRecords($data)
    {
        if (isset($data ["where_in"])) {
            foreach ($data ["where_in"] as $k => $v) {
                $this->company_db->where_in($k, $v);
            }
        }
        
        if (isset($data ["where"])) {
            $this->company_db->where($data ["where"]);
        }
        
        $this->company_db->update($data ["table"], $data ["update"]);
        $result = false;
        if ($this->company_db->affected_rows() > 0) {
            $result = true;
        }
        
        return $result;
    }

    public function deleteRecords($data)
    {
        if (isset($data ["where_in"])) {
            foreach ($data ["where_in"] as $k => $v) {
                $this->company_db->where_in($k, $v);
            }
        }
        if(isset($data ["where"])){
            $this->company_db->where($data ["where"]);
        }
        
        $this->company_db->delete($data ["table"]);
        
        $result = false;
        if ($this->company_db->affected_rows() > 0) {
            $result = true;
        }
        
        return $result;
    }

    public function countRecords($data)
    {
        if (isset($data ["where"])) {
            $this->company_db->where($data ["where"]);
        }
        if (isset($data ["like"])) {
            $this->company_db->like($data ["like"] [0], $data ["like"] [1], $data ["like"] [2]);
        }
        if (isset($data ["or_like"])) {
            die("Please Use GROUP query for OR LIKE");
            /* foreach ($data ["or_like"] as $k => $v) {
                $this->company_db->or_like($v [0], $v [1], $v [2]);
            } */
        }
        
        if (isset($data ["or_where_in"])) {
            die("Please Use GROUP query for OR WHERE IN");
            /* foreach ($data ["or_where_in"] as $k => $v) {
                $this->company_db->or_where_in($k, $v);
            } */
        }
        
        if (isset($data ["groupBy"])) {
            $this->company_db->group_by($data ["groupBy"]);
        }
        $this->company_db->from($data ["table"]);
        $result = $this->company_db->get()->num_rows();
        
        return $result;
    }

    public function selectFromJoin($data, $array = false)
    {
        $this->company_db->select($data ["select"]);
        $this->company_db->from($data ["table"]);
        if (isset($data ["where"])) {
            $this->company_db->where($data ["where"]);
        }
        if (isset($data ["join"])) {
            foreach ($data ["join"] as $k => $v) {
                if (isset($v [2])) {
                    $this->company_db->join($k, $v [0], $v [1], $v [2]);
                }
                else {
                    $this->company_db->join($k, $v [0], $v [1]);
                }
            }
        }
        
        if (isset($data ["or_where_in"])) {
            die("Please Use GROUP query for OR WHERE IN");
            /* foreach ($data ["or_where_in"] as $k => $v) {
                $this->company_db->or_where_in($k, $v);
            } */
        }
        
        if (isset($data ["where_in"])) {
            foreach ($data ["where_in"] as $k => $v) {
                $this->company_db->where_in($k, $v);
            }
        }
        
        if (isset($data ["like"])) {
            $this->company_db->like($data ["like"] [0], $data ["like"] [1], $data ["like"] [2]);
        }
        if (isset($data ["or_like"])) {
            die("Please Use GROUP query for OR LIKE");
            /* foreach ($data ["or_like"] as $k => $v) {
                $this->company_db->or_like($v [0], $v [1], $v [2]);
            } */
        }
        if (isset($data ["and_like"])) {
            foreach ($data ["and_like"] as $k => $v) {
                $this->company_db->like($v [0], $v [1], $v [2]);
            }
        }
        
        /* Handling GROUPING for Query */
        if (isset($data ["group"])) {
            $this->company_db->group_start();
            if (isset($data ["group"] ["like"])) {
                $this->company_db->like($data ["group"] ["like"] [0], $data ["group"] ["like"] [1], $data ["group"] ["like"] [2]);
            }
            if (isset($data ["group"] ["or_like"])) {
                $this->company_db->or_like($data ["group"] ["or_like"] [0], $data ["group"] ["or_like"] [1], $data ["group"] ["or_like"] [2]);
            }
            $this->company_db->group_end();
        }
        
        if (isset($data ["order"])) {
            $this->company_db->order_by($data ["order"]);
        }
        
        if (isset($data ["skip"])) {
            $this->company_db->limit($data ["limit"], $data ["skip"]);
        }
        elseif (isset($data ["limit"])) {
            $this->company_db->limit($data ["limit"]);
        }
        
        if (isset($data ["groupBy"])) {
            $this->company_db->group_by($data ["groupBy"]);
        }
        
        if (isset($data ["having"])) {
            $this->company_db->having($data ["having"]);
        }
        $result = $this->company_db->get();
        if ($array) {
            $result = $result->result_array();
        }
        else {
            $result = $result->result();
        }
        
        return $result;
    }

    public function inserUpdateData($data)
    {
        $this->company_db->where($data ["match"]);
        $q = $this->company_db->get($data ["table"]);
        
        if ($q->num_rows() > 0) {
            $this->company_db->where($data ["match"]);
            $res = $this->company_db->update($data ["table"], $data ["update"]);
        }
        else {
            $res = $this->company_db->insert($data ["table"], $data ["insert"]);
        }
        
        return $res;
    }

    public function isDuplicate($data)
    {
        $this->company_db->where($data ["where"]);
        if (isset($data ["or_group"] ["where"])) {
            $this->company_db->or_group_start();
            $this->company_db->where($data ["or_group"] ["where"]);
            $this->company_db->group_end();
        }
        
        $count = $this->company_db->get($data ["table"])->result();
        $result = false;
        if (count($count) > 0) {
            $result = true;
        }
        
        return $result;
    }
}
