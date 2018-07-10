<?php //$this->erp->print_arrays($discount['discount']) ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice&nbsp;<?= $invs->reference_no ?></title>
    <link href="<?php echo $assets ?>styles/theme.css" rel="stylesheet">
    <link href="<?php echo $assets ?>styles/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $assets ?>styles/custome.css" rel="stylesheet">

</head>

<style>
    .container {
        width: 100%;
        margin: 20px auto;
        padding: 10px;
        font-size: 14px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        position:relative;
    }
    .title-header tr{
        border: 1px solid #000 !important;
    }
    .border td,.border th{
        border: 1px solid #000 !important;
        border-top: 1px solid #000 !important;
    }

    @media print {

        .pageBreak {
            page-break-after: always;
            -webkit-page-break-after: always;
        }
        .container {
            margin: 20px auto !important;
            padding: 10px !important;

        }
        .customer_label {
            padding-left: 0 !important;
        }
        tbody{
            display:table-row-group;
            -webkit-print-color-adjust: exact;
        }
        .print th{
            color:white !important;
            background: #444 !important;

        }
        tfoot {
            display: table-footer-group;
            -webkit-display: table-footer-group;
            page-break-after: always;
        }
        .invoice_label {
            padding-left: 0 !important;
        }
        #footer {
            bottom: 10px !important;
        }
        #note{
            max-width: 95% !important;
            margin: 0 auto !important;
            border-radius: 5px 5px 5px 5px !important;
            margin-left: 26px !important;
        }
        .col-xs-12, .col-sm-12{
            padding-left:1px;
            padding-right:1px;
            margin-left:0px;
            margin-right:0px;
        }
        table {border-collapse: collapse;}


    }

    body{
        font-size: 12px !important;
        font-family: "Khmer OS System";
        -moz-font-family: "Khmer OS System";
    }
    .header{
        font-family:"Khmer OS Muol Light";
        -moz-font-family: "Khmer OS System";
        font-size: 18px;
    }

    .table > thead > tr > th,.table > thead > tr > td, tbody > tr > th, .table > tfoot > tr > th, .table > tbody > tr > td, .table > tfoot > tr > td{
        padding:5px;
    }
    .title{

    }
    h4{
        font-family:"Khmer OS Muol" !important;
        -mox-font-family:"Khmer OS Muol";
        font-size: 15px;
        margin-top: 0px;
        margin-bottom: 0px;
    }
    .noPadding tr{
        padding: 0px 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        border: none;
    }
    .noPadding tr td{
        padding: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        border:1px solid white;
    }
    .border-foot td{
        border: 1px solid #000 !important;
    }
    thead tr th{
        font-weight: normal;
        text-align: center;
    }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#hide").click(function(){
            $(".myhide").toggle();
        });
    });
</script>
<body>
<div class="container" style="width: 821px;margin: 0 auto;">
    <div class="col-xs-12"
        <?php
        $cols = 6;
        if ($discount != 0) {
            $cols = 7;
        }
        ?>
        <div class="row">
            <table class="table">
                <thead>
                    <tr class="thead" style="border-left:none;border-right: none;border-top:none;">
                        <th colspan="9" style="border-left:none;border-right: none;border-top:none;border-bottom: 1px solid #000 !important;">
                            <div class="row" style="margin-top: 0px !important;">
                                <div class="col-sm-3 col-xs-3 " style="margin-top: 0px !important;">
                                    <?php if(!empty($biller->logo)) { ?>
                                        <img class="img-responsive myhide" src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>"id="hidedlo" style="width: 140px; " />
                                    <?php } ?>
                                </div>
                                <div  class="col-sm-7 col-xs-7 company_addr "  style="margin-top: -10px !important;">
                                        <div class="myhide">
                                            <center >
                                                <?php if($biller->company) { ?>
                                                    <h3 class="header"><?= $biller->company ?></h3>
                                                <?php } ?>

                                                <div style="margin-top: 15px;">
                                                    <?php if(!empty($biller->vat_no)) { ?>
                                                        <p>លេខអត្តសញ្ញាណកម្ម អតប (VAT No):&nbsp;<?= $biller->vat_no; ?></p>
                                                    <?php } ?>

                                                    <?php if(!empty($biller->address)) { ?>
                                                        <p style="margin-top:-10px !important;">អាសយដ្ឋាន ៖ &nbsp;<?= $biller->address; ?></p>
                                                    <?php } ?>

                                                    <?php if(!empty($biller->phone)) { ?>
                                                        <p style="margin-top:-10px ;">ទូរស័ព្ទលេខ (Tel):&nbsp;<?= $biller->phone; ?></p>
                                                    <?php } ?>

                                                    <?php if(!empty($biller->email)) { ?>
                                                        <p style="margin-top:-10px !important;">សារអេឡិចត្រូនិច (E-mail):&nbsp;<?= $biller->email; ?></p>
                                                    <?php } ?>
                                                </div>

                                            </center>
                                        </div>
                                        <div class="invoice" style="margin-top:20px;">
                                            <center>
                                                <h4><b>វិក្កយបត្រអាករ</b></h4>
                                            </center>

                                        </div>
                                </div>
                                <div class="col-sm-2 col-xs-2 pull-right">
                                    <!--<div class="row">
                                            <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;" onclick="window.print();">
                                                <i class="fa fa-print"></i> <?= lang('print'); ?>
                                            </button>
                                        </div>
                                        <div class="row">
                                            <button type="button" class="btn btn-xs btn-default no-print pull-right " id="hide" style="margin-right:15px;" onclick="">
                                                <i class="fa"></i> <?= lang('Hide/Show_header'); ?>
                                            </button>
                                        </div>-->

                                </div>
                            </div>
                            <div class="row" style="text-align: left;">
                                <div class="col-sm-7 col-xs-7">
                                    <table >
                                            <tr>
                                                <td style="width: 25%;font-size: 18px;font-family: 'Khmer OS Muol Light';"><b>អតិថិជនៈ</b></td>

                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">ឈ្មោះក្រុមហ៊ុន​​​​​​ឬអតិថិជន</td>
                                                <td style="width: 5%;">:</td>
                                                <td style="width: 30%;"><?= $customer->company ?></td>
                                            </tr>
                                            <tr>
                                                <td>ទូរស័ព្ទលេខ</td>
                                                <td>:</td>
                                                <td><?= $customer->phone ?></td>
                                            </tr>
                                            <tr>
                                                <td>អាសយដ្ឋាន </td>
                                                <td>:</td>
                                                <?php if(!empty($customer->address_kh)) { ?>
                                                    <td><?= $customer->address_kh?></td>
                                                <?php }else { ?>
                                                    <td><?= $customer->address ?></td>
                                                <?php } ?>
                                            </tr>

                                            <tr>
                                                <td style="width: 20% !important">លេខអត្តសញ្ញាណកម្ម អតប </td>
                                                <td>:</td>
                                                <td><?= $customer->vat_no ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 20% !important">លេខបញ្ជាទិញ</td>
                                                <td>:</td>
                                                <td><?= $customer->vat_no ?></td>
                                            </tr>

                                    </table>
                                </div>
                                <div class="col-sm-5 col-xs-5">
                                    <table class="noPadding" border="none">
                                        <tr>
                                            <td style="width: 45%;">លេខរៀងវិក័យបត្រ</sup></td>
                                            <td style="width: 5%;">:</td>
                                            <td style="width: 50%;"><?= $invs->reference_no ?></td>
                                        </tr>
                                        <tr>
                                            <td>កាលបរិច្ឆេទ</td>
                                            <td>:</td>
                                            <td><?= $this->erp->hrld($invs->date); ?></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </th>
                    </tr>
                    <tr class="border thead print" style="">
                        <th>ល.រ</th>
                        <th>លេខកូដទំនិញ</th>
                        <th>បរិយាយមុខទំនិញ</th>
                        <th>បរិមាណ</th>
                        <th>ចំនួន</th>
                        <th>ថ្លៃឯកតា</th>

                        <!--<?php if ($Settings->product_discount) { ?>
                            <th>បញ្ចុះតម្លៃ</th>
                        <?php } ?>
                        <?php if ($Settings->tax1) { ?>
                            <th style="width: 10%">ពន្ធទំនិញ</th>
                        <?php } ?>-->
                        <th>ថ្លៃទំនិញ</th>
                    </tr>
                </thead>
                <tbody>

                <?php

                $no = 1;
                $erow = 1;
                $totalRow = 0;
                foreach ($rows as $row) {
                    $free = lang('free');
                    $product_unit = '';
                    $total = 0;

                    if($row->variant){
                        $product_unit = $row->variant;
                    }else{
                        $product_unit = $row->uname;
                    }
                    $product_name_setting;
                    if($setting->show_code == 0) {
                        $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                    }else {
                        if($setting->separate_code == 0) {
                            $product_name_setting = $row->product_name . " (" . $row->product_code . ")" . ($row->variant ? ' (' . $row->variant . ')' : '');
                        }else {
                            $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                        }
                    }
                    ?>
                    <tr class="border">
                        <td style="border-bottom: 1px solid #FFF !important;vertical-align: middle; text-align: center"><?php echo $no ?></td>
                        <td style="border-bottom: 1px solid #FFF !important;vertical-align: middle;">
                            <?=$row->product_noted;?>
                        </td>
                        <td style="border-bottom: 1px solid #FFF !important;vertical-align: middle;">
                            <?=$row->product_name;?>
                        </td>

                        <td style="border-bottom: 1px solid #FFF !important;vertical-align: middle; text-align: center">
                            <?= $product_unit ?>
                        </td>
                        <td style="border-bottom: 1px solid #FFF !important;vertical-align: middle; text-align: center">
                            <?=$this->erp->formatQuantity($row->quantity);?>
                        </td>
                        <td style="border-bottom: 1px solid #FFF !important;vertical-align: middle; text-align: right">
                            <?php
                            if($row->real_unit_price==0){echo "Free";}
                            else{
                                echo $this->erp->formatMoney($row->real_unit_price);
                                }
                            ?>
                        </td>
                       <!-- <?php if ($row->item_discount) {?>
                            <td style="vertical-align: middle; text-align: center">

                                <?php
                                    if(strpos($row->discount,"%")){
                                        echo "<small style='font-size:10px;'>(".$row->discount.")</small>" ;
                                    }
                                    echo $this->erp->formatMoney($row->item_discount);
                                ?>
                            </td>
                        <?php } ?>
                        <?php if ($row->item_tax) {?>
                            <td style="vertical-align: middle; text-align: center">
                                <?=$this->erp->formatMoney($row->item_tax);?></td>
                        <?php } ?>-->
                        <td style="border-bottom: 1px solid #FFF !important;vertical-align: middle; text-align: right">
                            <?php
                                if($row->subtotal==0){echo "Free";}
                                else{
                                    echo $this->erp->formatMoney($row->subtotal);
                                }
                            ?>
                        </td>
                    </tr>

                    <?php
                    $no++;
                    $erow++;
                    $totalRow++;
//                    if ($totalRow % 25 == 0) {
//                        echo '<tr class="pageBreak"></tr>';
//                    }

                }
                ?>
                <?php
                if($erow<4){
                    $k=4 - $erow;
                    for($j=1;$j<=$k;$j++) {
                        if($discount != 0) {
                            echo  '<tr class="border">
                                    <td style="border-bottom: 1px solid #FFF !important;" height="30px" class="text-center">'.$no.'</td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                </tr>';
                        }else {
                            echo  '<tr class="border">
                                    <td style="border-bottom: 1px solid #FFF !important;" height="30px" class="text-center">'.$no.'</td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                    <td style="border-bottom: 1px solid #FFF !important;"></td>
                                </tr>';
        }
                        $no++;
                    }
                    echo  '<tr class="border">
                                    <td style="border-top: 1px solid #FFF !important;" height="30px" class="text-center">'.$no.'</td>
                                    <td style="border-top: 1px solid #FFF !important;"></td>
                                    <td style="border-top: 1px solid #FFF !important;"></td>
                                    <td style="border-top: 1px solid #FFF !important;"></td>
                                    <td style="border-top: 1px solid #FFF !important;"></td>
                                    <td style="border-top: 1px solid #FFF !important;"></td>
                                    <td style="border-top: 1px solid #FFF !important;"></td>
                                </tr>';
                }else{
                    echo  '<tr class="border">
                                <td style="border-top: 1px solid #FFF !important;"></td>
                                <td style="border-top: 1px solid #FFF !important;"></td>
                                <td style="border-top: 1px solid #FFF !important;"></td>
                                <td style="border-top: 1px solid #FFF !important;"></td>
                                <td style="border-top: 1px solid #FFF !important;"></td>
                                <td style="border-top: 1px solid #FFF !important;"></td>
                                <td style="border-top: 1px solid #FFF !important;"></td>
                            </tr>';
                }
                ?>
                <?php
                $s = $this->db->get_where('erp_sales', array('created_by' => $this->session->userdata('user_id')), 1);

                $row = 1;
                $col =3;
                if ($discount != 0) {
                    $col = 3;
                }
                if ($invs->grand_total != $invs->total) {

                }

                if ($invs->order_tax != 0) {

                    $col =3;
                }

                ?>




                <tr class="border-foot">

                    <td colspan="3" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">

                    </td>

                    <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុប

                    </td>
                    <td align="right">
                        <?php
                            if($invs->grand_total==0){echo "Free";}
                            else{
                                echo $this->erp->formatMoney($invs->total);
                            }
                        ?>
                    </td>
                </tr>
                <tr class="border-foot">
                    <td colspan="3" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">

                    </td>
                    <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">អាករលើតម្លៃបន្ថែម ១០%</td>
                    <td align="right"><?= $this->erp->formatMoney($invs->order_tax); ?></td>
                </tr>
                <tr class="border-foot">
                    <td colspan="3" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">

                    </td>
                    <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុបរួម</td>
                    <td align="right"><?= $this->erp->formatMoney($invs->grand_total); ?></td>
                </tr>


                </tbody>
                <tfoot class="tfoot">
                    <tr>
                        <th colspan="9">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div id="footer" class="row" >
                                <div class="col-sm-4 col-xs-4">
                                    <center>
                                        <hr style="margin:0; border:1px solid #000; width: 80%">
                                        <p style=" margin-top: 4px !important">ហត្ថលេខា និងឈ្មោះអ្នកទិញ</p>
                                        <!--<p style="margin-top:-10px; ">Customer's Signature & Name</p>-->
                                    </center>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <center>

                                    </center>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <center>
                                        <hr style="margin:0; border:1px solid #000; width: 80%">
                                        <p style="margin-top: 4px !important">ហត្ថលេខា និងឈ្មោះអ្នកលក់</p>
                                        <!-- <p style="margin-top:-10px;">Seller's Signature & Name</p>-->
                                    </center>
                                </div>

                            </div><br>
                            <div id="footer" class="row" >
                                <div class="col-sm-12 col-xs-12">
                                    <p>សម្គាល់៖ច្បាប់ដើមសម្រាប់អ្នកទិញ ច្បាប់ចម្លងសម្រាប់អ្នកលក់</p>
                                </div>
                            </div>
                        </th>
                    </tr>


                </tfoot>

            </table>
        </div>




        <div style="width: 821px;margin: 20px">
            <a class="btn btn-warning no-print" href="<?= site_url('sales'); ?>" style="border-radius: 0">
                <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("back"); ?>
            </a>
            <a class="btn btn-primary no-print" href="<?= site_url('sales/add'); ?>" style="border-radius: 0">
                <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("Back To Add Sale"); ?>
            </a>
            <a class="btn btn-danger no-print" href="<?= site_url("sales/invoice_kc/". $invs->id); ?>" style="border-radius: 0">
                <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("Back To Standard Invoice"); ?>
            </a>
            <a class="btn btn-success no-print" href="<?= site_url('sales/invoice_kc_no_tax/' . $invs->id) ?>" style="border-radius: 0">
                <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("Back To No Tax Invoice"); ?>
            </a>
        </div>


    </div>

</body>
</html>