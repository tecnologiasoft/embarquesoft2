<?php

class Rights
{
    public $rightArray;
    public function __construct()
    {
        
    }

    public function rightsArray()
    {

        return [
            'menu_customer' => "company/customer/add",
            'menu_invoices' => [

                ['name' => 'title_add_new_invoices', 'url' => "company/invoice/createInvoice"],
                ['name' => 'title_edit_invoices', 'url' => "company/invoice/createInvoice1"],
                ['name' => 'change_only_shipto', 'url' => "company/invoice/createInvoice2"],
                ['name' => 'pay_current_invoice', 'url' => "company/invoice/createInvoice3"],
                ['name' => 'recive_payment', 'url' => "company/invoice/createInvoice4"],
                ['name' => 'label_print_invoice', 'url' => "company/invoice/createInvoice5"],

            ],

            'menu_payments' => "company/payment",

            'field_inventory' => [['name' => 'label_add_inventory', 'url' => "company/inventory/add"]],

            'label_pickup' => [
                ['name' => 'label_add_pickup', 'url' => "company/blahblah"],
                ['name' => 'current_date', 'url' => "company/blahblah2"],
                ['name' => 'edit_pickup', 'url' => "company/blahblah3"],
            ],

            'label_distribution' => "company/distributation",
            'field_warehouse' => [
                ['name' => 'field_change_barcode', 'url' => 'xyzUrlPoint'],
                ['name' => 'menu_inventory', 'url' => 'pcd'],
                ['name' => 'modify_branch', 'url' => 'asd'],
            ],
            'menu_employee' => 'company/employee/add',

            'label_user' => 'company/user/add',

            'label_autocall' => 'company/autcall',

            'label_reports' => [
                ['name' => 'field_customer', 'url' => 'xyzUrl'],
                ['name' => 'label_invoice', 'url' => 'xyzUrl1'],
                ['name' => 'field_payment', 'url' => 'xyzUrl2'],
                ['name' => 'field_warehouse', 'url' => 'xyzUrl3'],
                ['name' => 'client_list', 'url' => 'xyzUrl4'],
                ['name' => 'end_of_day', 'url' => 'xyzUrl5'],
                ['name' => 'label_custom', 'url' => 'xyzUrl6'],
            ],

            'label_supervisor' => 'company/Supervisor',

            'menu_back_office' => [
                ['name' => 'end_of_day', 'url' => 'xyzUrl_revierse'],
                ['name' => 'label_custom', 'url' => 'pholips'],
            ],
            

        ];

        return $this->$rightArray;
    }

    public function access($url, $flag = false)
    {

        $ci = get_instance();
        if ($ci->session->userdata('userdata')->type == COMPANY) {

            return site_url($url);

        }

        $rights = $ci->session->userdata('userdata')->modules;
        if ($rights) {
            $arr = json_decode($rights, true);
            foreach ($arr['rights'] as $value) {

                if (!is_array($value)) {
                    $mainArray[] = $value;
                    continue;
                }

                foreach ($value as $v) {

                    $mainArray[] = $v['url'];
                }

            }

        }

        if (in_array($url, $mainArray)) {
            return site_url($url);
        } else {
            if ($flag) {

                redirect('user/logout');
            }
            return 'javascript:void(0);';
        }

    }

}
