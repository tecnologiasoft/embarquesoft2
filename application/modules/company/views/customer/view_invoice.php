<style>
  .form_label {
  color: #265791;
  font-weight: bold !important;
  }
  input[type = 'text'],select{
  color: blue !important; 
  font-weight: bold !important;
  }
</style>
<div class="modal-content">
  <div class="modal-header modal_header">
    <h5 class="modal-title" id="exampleModalLabel"><?php echo 'Invoice Details'; ?></h5>
    <button type="button" class="close"  onclick = "$('#another_popup').modal('hide');">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-xl-12 col-lg-12">
        <div class="tab-pane" id="m_user_profile_tab_3" aria-expanded="true">
          <div class="mm_datatable m-datatable m-datatable--default m-datatable--loaded" id="ajax_data1" style="">
            <table class="m-datatable__table" id="m-datatable" style="overflow-x: auto;height: 100%;width: 100%;">
              <thead class="m-datatable__head" style="background-color: blue;color:white;">
              <tr class="m-datatable__row" style="height: 39px;">
                <th data-field="id" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--sort"><span style="width: 30px;">#</span></th>
                <th data-field="invoice_number" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Invoice Id</span></th>
                <th data-field="sub_total" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Total Amount</span></th>
                <th data-field="payments" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Paid Amount</span></th>
                <th data-field="final_balance" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Balance</span></th>
                <th data-field="invoice_date" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Payment Date</span></th>
                <th data-field="invoice_date" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Transaction Id</span></th>
                <th data-field="invoice_date" class="m-datatable__cell m-datatable__cell--sort"><span style="width: 100px;">Receipt No.</span></th>
              </tr>
              </thead>
              <tbody class="m-datatable__body" style="">
                <?php $a = 1; 
                foreach ($invoiceList as $key => $value) {?>
                <tr data-row="0" class="m-datatable__row m-datatable__row--even" style="height: 42px;">
                  <td data-field="invoice_number" class="m-datatable__cell">
                    <span style="width: 60px;"><?php echo $a;?></span>
                  </td>
                  <td data-field="invoice_number" class="m-datatable__cell">
                    <span style="width: 100px;"><?php echo $value['invoice_id'];?></span>
                  </td>
                  <td data-field="sub_total" class="m-datatable__cell">
                    <span style="width: 100px;"><?php echo $value['amount'];?></span>
                  </td>
                  <td data-field="payments" class="m-datatable__cell">
                    <span style="width: 100px;"><?php echo $value['payed'];?></span>
                  </td>
                  <td data-field="final_balance" class="m-datatable__cell">
                    <span style="width: 100px;">
                    <span><?php echo $value['balance'];?></span>
                  </span>
                  </td>
                  <td data-field="invoice_date" class="m-datatable__cell">
                    <span style="width: 100px;"><?php echo $value['payment_date'];?></span>
                  </td>
                  <td data-field="invoice_date" class="m-datatable__cell">
                    <span style="width: 100px;"><?php echo $value['transaction_id'];?></span>
                  </td>
                  <td data-field="invoice_date" class="m-datatable__cell">
                    <span style="width: 100px;"><?php echo $value['receipt_number'];?></span>
                  </td>
                </tr>
                <?php 
                $a++;
                }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
