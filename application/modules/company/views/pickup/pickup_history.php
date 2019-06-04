<style>
    .modal-dialog.modal-xl{
    max-width:95%;
    }

    .custom_table{
        border:1px solid #265791;
        border-collapse: collapse;
        background-color:#fff;
        font-size: 1rem;
        text-align: left;
        width:100%;
        border-bottom:0px;
        margin-bottom:20px;
    }
    .custom_table td{
        border:1px solid #265791;
        border-collapse: collapse;
    }

    .custom_table .custom_table_heading{
        border-collapse: collapse;
        background-color:#265791;
        color:#fff;
        font-weight: 600;
        font-size: 1rem;
        text-align: center;
        padding:0px 10px;
    }
    .custom_table .custom_table_body{
        width:100%;
        display:inline-table;
        border-collapse: collapse;
    }

    .custom_table .custom_table_cell{
        color:#333;
        font-weight: 400;
        padding:0px 10px;
        border-collapse: collapse;
    }
    .custom_table .custom_table_cell:last-child{
        border-right:0px;
    }


    </style>
<div class="modal fade" id="pickup_history" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"         aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-custom">
                        <h5 class="modal-title text-white" id="exampleModalLabel">
                            <?php echo $this->lang->line('label_pickup_history'); ?>
                        </h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>
                      
                      <div class="modal-body">
                      <div class="" id="ajax_data" style="">
                      <?php foreach($pickup_history as $k => $v) {?>
                        <table class="custom_table" id="m-datatable--1488926471641" style="display: block; height: auto; overflow-x: auto;">
                            <tbody class="custom_table_body" style="">
                                <tr class="custom_table_row" style="height: 41px;">

                                    <th  class="custom_table_heading"><span class="text-whte"> <?=$this->lang->line('label_updated_by')?> </span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_date')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_last_name')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_first_name')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_address_line_1')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('apartment')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_address_line_2')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_city')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_state')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_zipcode')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_telephone')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_created_by')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_total_box')?></span> </th>
                                    
                                </tr>
                                <tr data-row="0" class="custom_table_row" style="height: 43px;">
                                    <td  class="custom_table_cell"><?=@print_history($v[22])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[25])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[1])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[0])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[2])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[6])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[7])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[3])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[4])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[5])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[9])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[23])?></td>
                                    <td  class="custom_table_cell"><?=@print_history($v[19])?></td>
                                    
                                    
                                    
                                    
                                    

                                </tr>
                                <tr class="custom_table_row" style="height: 41px;">
                                
                                <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_total_barrel')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_cellphone')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_status')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_created_date')?></span> </th>
                                    
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_item_1')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_item_2')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_pickup_date')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_pickup_time')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_zone')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_driver')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_shipto_id')?></span> </th>
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('menu_warehouse')?></span> </th>
                                    
                                    <th  class="custom_table_heading"> <span class="text-whte"> <?=$this->lang->line('label_comment')?></span> </th>
                                    
                                </tr>
                                <tr data-row="0" class="custom_table_roe" style="height: 43px;">
                                
                                <td  class="custom_table_cell"><?=@print_history($v[20])?></td>
                                <td  class="custom_table_cell"><?=@print_history($v[10])?></td>
                                <td  class="custom_table_cell"><?=@print_history($v[13])?></td>
                                <td  class="custom_table_cell"><?=@print_history($v[25])?></td>
                                
                                <td  class="custom_table_cell"><?=@print_history($v[14])?></td>
                                <td  class="custom_table_cell"><?=@print_history($v[15])?></td>
                                <td  class="custom_table_cell"><?=@print_history($v[17])?></td>
                                <td  class="custom_table_cell"><?=@print_history($v[18])?></td>
                                <td  class="custom_table_cell"><?=@print_history($v[12])?></td>
                                <td  class="custom_table_cell"><?=@print_history($v[16])?></td>
                                <td  class="custom_table_cell"><?=@print_history($v[21])?></td>
                                <td  class="custom_table_cell"></td>
                                <td  class="custom_table_cell"><?=@print_history($v[11])?></td>
                                    
                                    
                                    
                                </tr>
                            </tbody>
                            
                        </table>
                        <hr style = "color:black;"/>
                      <?php } ?>
                        </div>

                    </div>

                        <div class="modal-footer">
                       
                            <button type="submit" class="btn btn-success">
                                <?php echo $this->lang->line('label_back'); ?>
                            </button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!--end::Modal-->