<?php

class Merchantstore_model extends CI_Model {

    var $column_search = array('m.fname','m.lname','c.name','ms.store_name','ms.contact_name','ms.contact_phone','ms.website','ms.about','ms.address','ms.status'); //set column field database for datatable searchable 
    var $order = array('ms.id' => 'DESC'); // default order 
    function __construct()
    {
        parent::__construct();
    }

    // merchantstore Models
    function _get_datatables_query()
    {
        $this->db->select("ms.*, CONCAT(m.fname, ' ', m.lname) as merchant_name, c.name as category,
                CONCAT('".base_url().MERCHANTSTORE_IMAGE_THUMB."','',store_banner) as store_banner_thumb,
                CONCAT('".base_url().MERCHANTSTORE_IMAGE."','',store_banner) as store_banner,
                CONCAT('".base_url().MERCHANTSTORELOGO_IMAGE_THUMB."','',store_logo) as store_logo_thumb,
                CONCAT('".base_url().MERCHANTSTORELOGO_IMAGE."','',store_logo) as store_logo");
        $this->db->from('tbl_merchant_store ms');
        $this->db->join('tbl_merchant as m','ms.merchant_id = m.id');
        $this->db->join('tbl_category as c','ms.category_id = c.id');
        $i = 0;
        
        if(!empty($_REQUEST['datatable']['query']['generalSearch'])) // if datatable send POST for search
        {
            foreach ($this->column_search as $item) // loop column 
            {        
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_REQUEST['datatable']['query']['generalSearch']);
                }
                else
                {
                    $this->db->or_like($item, $_REQUEST['datatable']['query']['generalSearch']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
                
                $i++;
            }
        }

        if(!empty($_REQUEST['datatable']['query']['Status']) && $_REQUEST['datatable']['query']['Status'] != 'Unverified')
        {
            $this->db->where('ms.status',$_REQUEST['datatable']['query']['Status']);
        }

        if(!empty($_REQUEST['datatable']['query']['Category']) && $_REQUEST['datatable']['query']['Category'] != 'Unverified')
        {
            $this->db->where('ms.category_id',$_REQUEST['datatable']['query']['Category']);
        }
        
        if(!empty($_REQUEST['datatable']['sort']['field'])) //&& in_array($_REQUEST['datatable']['sort']['field'], $column_search)) // here order processing
        {
            $this->db->order_by($_REQUEST['datatable']['sort']['field'], $_REQUEST['datatable']['sort']['sort']);
        } 
        else if(!empty($this->order))
        {   
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    /*Get merchantstore table data*/
    function get_datatables()
    {
        $offset = ($_REQUEST['datatable']['pagination']['page'] - 1)*$_REQUEST['datatable']['pagination']['perpage'];
        $this->_get_datatables_query();
        if($_REQUEST['datatable']['pagination']['perpage'] != -1)
        $this->db->limit($_REQUEST['datatable']['pagination']['perpage'], $offset);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row)
            {
                if($row->status == 'Unverified')
                {
                    $row->status = '0';
                    $row->reverse_state = '1';
                }
                elseif ($row->status == 'Verified') {
                    $row->status = '1';
                    $row->reverse_state = '0';
                }
                $row->encode_id = base64_encode($row->id);
            }
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    /*Get counts of merchantstore*/
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    /*Get merchantstore details*/
    function get_merchantstore_data($merchantstore_id)
    {
        $this->db->select("ms.*, CONCAT(m.fname, ' ', m.lname) as merchant_name, c.name as category,
                CONCAT('".base_url().MERCHANTSTORE_IMAGE_THUMB."','',store_banner) as store_banner_thumb,
                CONCAT('".base_url().MERCHANTSTORE_IMAGE."','',store_banner) as store_banner,
                CONCAT('".base_url().MERCHANTSTORELOGO_IMAGE_THUMB."','',store_logo) as store_logo_thumb,
                CONCAT('".base_url().MERCHANTSTORELOGO_IMAGE."','',store_logo) as store_logo");
        $this->db->from('tbl_merchant_store ms');
        $this->db->join('tbl_merchant as m','ms.merchant_id = m.id');
        $this->db->join('tbl_category as c','ms.category_id = c.id');
        $this->db->where('ms.id', $merchantstore_id);    
        $query = $this->db->get();
        if($query->num_rows() >= 1)
        {
            $merchantstore = $query->row_array();
            /*Get store category*/
            $store_category = $this->get_merchantstore_category($merchantstore_id);
            $merchantstore['subcategory_list'] = $store_category;
            $merchantstore['subcategory_id'] = array_column($store_category, 'subcategory_id');
            return $merchantstore;
        }
        else
        {
            return false;
        }
    }

    /*Get merchant store subcategory list*/
    function get_merchantstore_category($merchantstore_id)
    {
        $this->db->select("mc.*, c.name as subcategory");
        $this->db->from('tbl_merchant_category as mc');
        $this->db->where('mc.merchant_store_id', $merchantstore_id);
        $this->db->join('tbl_category as c','mc.subcategory_id = c.id');
        $query = $this->db->get();
        if($query->num_rows() == 1)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }

    /*Change merchantstore status*/
    function merchantstore_state($id,$state)
    {
        if ($state == '0') 
            $data_array['status'] = 'Unverified';
        else
            $data_array['status'] = 'Verified';   

        $this->db->where('id',$id);
        $this->db->update('tbl_merchant_store', $data_array);
    }

}
?>