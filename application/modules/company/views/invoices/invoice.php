<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $this->site_name; ?>  - Invoice</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:400,700" />
    <style type="text/css">
        * {
            box-sizing: border-box;
        }
        body {
            font-size: 16px;
        }
        body {
            background: transparent !important;
            height: auto;
            min-width: 880px;
            font-size: 14px;
        }
        body {
            background: #f3f4f5;
            padding: 0;
            margin: 0;
            min-width: 1200px;
            line-height: 1.3em;
            font-family: Poppins;
            font-size: 14px;
            color: #3e3c3c;
            height: 100%;
        }
        .headings{
            color: #151212;
            font-weight: bold;
        }

        .invoicetable th{
            border: 1px solid #000;
            color: #151212;
            font-weight: bold;
        }
        .invoicetable td.border-td{
            border: 1px solid #000;
            text-align: right;
        }
        .invoicetable td.final-td{
            border: 1px solid #000;
            background-color: #151212;
            text-align: right;
        }
        .invoicetable td > span{
            float: left;
            width: 15px;
            text-align: right;
        }
        .header_invoice{
            color: #265791;
            font-size: 42px;
            line-height: 1.3em;
            margin-bottom: 70px;
        }
        .document:first-child {
            page-break-before: avoid;
        }
        .document {
            margin-bottom: 0;
            page-break-before: always;
        }
        .document {
            position: relative;
            background: #fff;
            padding: 40px;
            margin-bottom: 10px;
        }
        .company-information {
            color: #555;
        }
        table.spaced tr td:first-child {
            padding-right: 20px;
        }
        .line-items {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .line-items thead {
            display: table-row-group;
        }
        .line-items th {
            background-color: #265791;
            color: #fff;
            font-weight: 400;
            border: 1px solid #265791;
        }
        .line-items th, .line-items td {
            padding: 10px;
        }
        th.cram, td.cram {
            width: 1px;
        }
        .no-wrap {
            white-space: nowrap;
        }
        .inline-left {
            text-align: left;
        }
        .inline-left {
            text-align: left;
        }
        .line-items td {
            border: 1px solid #999;
        }
        .line-items th, .line-items td {
            padding: 10px;
        }
        .left {
            float: left;
        }
        .half {
            width: 50%;
        }
        .right {
            float: right;
        }
        .inline-right {
            text-align: right;
        }
        .hidden, .invisible {
            visibility: hidden;
            display: none;
        }
        .signatures {
            padding-top: 20px;
            padding-bottom: 20px;
            padding-left: 11px;
            padding-right: 11px;
        }
    </style>
</head>
<body>
    <div class="document">
        <div style="padding: 0 65px;">
            <table style="width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                    <tr>
                        <td width="50%">
                            <div class="logo-container" style="margin-left: -65px;"></div>
                        </td>
                        <td width="10%"><div style="width: 20px;"></div></td>
                        <td width="50%">
                            <div class="title header_invoice" style="display: table-cell; vertical-align: middle;">Invoice</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="height: 15px;">&nbsp;</td>
                    </tr>
                    <tr valign="top">
                        <td>
                            <div class="company-information">
                                <?php echo $this->session->userdata('company_name'); ?><br>
                                Mobile Phone: <?php echo $this->session->userdata('company_telephone_number'); ?><br>
                                <?php echo $this->session->userdata('company_email'); ?></div>
                        </td>
                        <td>&nbsp;</td>
                        <td>
                            <table class="spaced" cellpadding="0">
                                <tbody>
                                    <tr valign="top">
                                        <td style="white-space: nowrap;"><strong>Invoice Number:</strong></td>
                                        <td><?php echo $result['invoice_number']; ?></td>
                                    </tr>
                                    <tr valign="top">
                                        <td style="white-space: nowrap;"><strong>Invoice Date:</strong></td>
                                        <td><?php echo date('Y-m-d',strtotime($result['invoice_date'])); ?></td>
                                    </tr>
                                    <tr valign="top">
                                        <td style="white-space: nowrap;"><strong>Payment Terms:</strong></td>
                                        <td><?php echo $result['pay_term']; ?></td>
                                    </tr>
                                    <tr valign="top">
                                        <td style="white-space: nowrap;"><strong>Invoice Amount:</strong></td>
                                        <td><?php echo $result['sub_total']; ?></td>
                                    </tr>
                                    <tr valign="top">
                                        <td style="white-space: nowrap;"><strong>Created By:</strong></td>
                                        <td><?php echo $result['user_name']; ?></td>
                                    </tr>
                                    <tr valign="top">
                                        <td style="white-space: nowrap;"><strong>Invoice Status:</strong></td>
                                        <td><?php echo $result['status']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr><td colspan="3" style="height: 20px;">&nbsp;</td></tr>
                    <tr valign="top">
                        <td>
                            <strong>Bill To</strong><br>
                                <?php echo $customer_data['fname']." ".$customer_data['lname']; ?><br>
                                <?php echo $customer_data['address']; ?><br>
                                <?php echo $customer_data['city'].", ".$customer_data['state'].", ".$customer_data['zipcode']; ?>
                        </td>
                        <td>&nbsp;</td>
                        <td>
                            <strong>Ship To</strong><br>
                                <?php echo $shipto_data['fname']." ".$shipto_data['lname']; ?><br>
                                <?php echo $shipto_data['address']; ?><br>
                                <?php echo $shipto_data['city'].", ".$shipto_data['state'].", ".$shipto_data['zipcode']; ?>                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table class="line-items">
            <thead>
                <tr>
                    <th class="inline-left cram no-wrap">#</th>
                    <th class="inline-left">Item Name</th>
                    <th class="inline-right cram no-wrap">Quantity</th>
                    <th class="inline-right cram no-wrap">Price</th>
                    <th class="inline-center cram no-wrap">Discount</th>
                    <th class="inline-right cram no-wrap">Ins</th>
                    <th class="inline-right cram no-wrap">Tax</th>
                    <th class="inline-right cram no-wrap">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($items_list)){
                        foreach ($items_list as $key => $value) {
                ?>
                            <tr>
                                <td class="inline-left"><?php echo $value['line_number']; ?></td>
                                <td class="inline-left">
                                    <?php echo $value['description_1']; ?>        
                                </td>
                                <td class="inline-right"><?php echo $value['qty']; ?></td>
                                <td class="inline-right"><?php echo $value['rate']; ?></td>
                                <td class="inline-right"><?php echo $value['discount']; ?></td>
                                <td class="inline-right"><?php echo $value['insurance']; ?></td>
                                <td class="inline-right"><?php echo $value['tax']; ?></td>
                                <td class="inline-right"><?php echo $value['total_price']; ?></td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
        <div class="half left" style="page-break-inside: avoid; padding-left: 11px;">
            &nbsp;
        </div>
        <div class="half left" style="padding-right: 6px;">
            <table class="spaced right" style="page-break-inside: avoid;">
                <tbody>
                    <tr>
                        <td>Subtotal:</td>
                        <td class="inline-right no-wrap">$ <?php echo $result['sub_total']; ?><span class="invisible">)</span></td>
                    </tr>
                    <tr>
                        <td><strong>Invoice Amount</strong></td>
                        <td class="inline-right no-wrap"><strong>$ <?php echo $result['sub_total']; ?><span class="invisible">)</span></strong></td>
                    </tr>
                </tbody>
            </table>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="signatures">
            <div class="signature"></div>
            <div class="signature"></div>
            <div class="clear"></div>
        </div>
    </div> 
</body>
</html>
<script type="text/javascript">
    window.focus();
    window.print();
</script>