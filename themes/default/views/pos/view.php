<?php
function product_name($name)
{
    return character_limiter($name, (isset($pos_settings->char_per_line) ? ($pos_settings->char_per_line-8) : 35));
}

if ($modal) {
    echo '<div class="modal-dialog no-modal-header" style="width:52%"><div class="modal-content"><div class="modal-body"><button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i></button>';
} else { ?>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <title><?= $page_title . " " . lang("no") . " " . $inv->id; ?></title>
        <base href="<?= base_url() ?>"/>
        <meta http-equiv="cache-control" content="max-age=0"/>
        <meta http-equiv="cache-control" content="no-cache"/>
        <meta http-equiv="expires" content="0"/>
        <meta http-equiv="pragma" content="no-cache"/>
        <link rel="shortcut icon" href="<?= $assets ?>images/icon.png"/>
        <link rel="stylesheet" href="<?= $assets ?>styles/theme.css" type="text/css"/>
        <style type="text/css" media="all">
            body {
                font-size: 14px !important;
            }

            @media print {
                body {
                    font-size: 11px !important;
                }
                .container {
                    height: 21cm !important;
                    margin-top: 0px !important;
                }
                .customer_label {
                    padding-left: 0 !important;
                }
                
                .invoice_label {
                    padding-left: 0 !important;
                }
                #footer{
                    position:absolute !important;
                    bottom:0 !important;
                }
                .row table tr td {
                    font-size: 12px !important;
                }

                .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th {
                    background-color: #444 !important;
                }

                .row .col-xs-7 table tr td, .col-sm-5 table tr td{
                    font-size: 12px !important;
                }
                #note{
                        max-width: 95% !important;
                        margin: 0 auto !important;
                        border-radius: 5px 5px 5px 5px !important;
                        margin-left: 26px !important;
                }
            }
            .thead th {
                text-align: center !important;
            }
            
            .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
                border: 1px solid #000 !important;
            }
            
            .company_addr h3 {
                font-family: Khmer Mool1 !important;
            }

            .company_addr h4 {
                font-weight: bold;
                font-family: Times New Roman !important;
            }
            
            .company_addr p {
                font-size: 12px !important;
                margin-top:-10px !important;
                padding-left: 20px !important;
            }
            
            .inv h4:first-child {
                font-family: Khmer Mool1 !important;
                font-size: 16px !important;
            }
            
            .inv h4:last-child {
                margin-top:5px !important;
                font-size: 14px !important;
                font-weight: bold;
                font-family: Times New Roman !important;
            }

            button {
                border-radius: 0 !important;
            }
        </style>

    </head>

    <body>

<?php } ?>


<div id="wrapper">
    <div id="receiptData">
    <div class="no-print">
    </div>
    <div id="receipt-data">
        <div class="container" style="width: 821px;margin: 0 auto;">
        <?php if ($message) { ?>
            <div class="alert alert-success">
                <button data-dismiss="alert" class="close" type="button">×</button>
                <?= is_array($message) ? print_r($message, true) : $message; ?>
            </div>
        <?php } ?>
        <div class="col-sm-12 col-xs-12" style="width: 794px;">
            <div class="row" style="margin-top: 20px;">
        
            <div class="col-sm-3 col-xs-3">
                <?php if(!empty($biller->logo)) { ?>
                    <img src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>" style="width: 165px; margin-left: 25px;" />
                <?php } ?>
            </div>
            
            <div class="col-sm-6 col-xs-6 company_addr" style="margin-top: -15px !important">
                <center>
                    <h3><?= $biller->name; ?></h3>
                    <h4><?= $biller->company; ?></h4>
                
                    <?php if(!empty($biller->vat_no)) { ?>
                        <p style="font-size: 11px;">លេខអត្តសញ្ញាណកម្ម អតប (VAT No):&nbsp;<?= $biller->vat_no; ?></p>
                    <?php } ?>
                    
                    <?php if(!empty($biller->address)) { ?>
                        <p style="margin-top:-10px !important;font-size: 11px;">អាសយដ្ឋាន ៖ &nbsp;<?= $biller->address; ?></p>
                    <?php } ?>
                    
                    <?php if(!empty($biller->phone)) { ?>
                        <p style="margin-top:-10px !important;font-size: 11px;">ទូរស័ព្ទលេខ (Tel):&nbsp;<?= $biller->phone; ?></p>
                    <?php } ?>
                    
                    <?php if(!empty($biller->email)) { ?>
                        <p style="margin-top:-10px !important;font-size: 11px;">សារអេឡិចត្រូនិច (E-mail):&nbsp;<?= $biller->email; ?></p>
                    <?php } ?>
                </center>
                </div>
                <div class="col-sm-3 col-xs-3">
                    <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;" onclick="window.print();">
                        <i class="fa fa-print"></i> <?= lang('print'); ?>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12 inv" style="margin-top: -10px !important">
                    <center>
                        <h4>វិក្កយបត្រ</h4>
                        <h4 style="margin-top:-10px !important;">INVOICE</h4>
                    </center>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7 col-xs-7" style="margin-top: -20px !important">
                    <table style="font-size: 12px;">
                        <?php if(!empty($customer->company)) { ?>
                        <tr>
                            <td style="width: 5%;">ឈ្មោះក្រុមហ៊ុន</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 30%;"><?= $customer->company ?></td>
                        </tr>
                        <?php } ?>
                        <?php if(!empty($customer->name_kh || $customer->name)) { ?>
                        <tr>
                            <td>អតិថិជន</td>
                            <td>:</td>
                            <?php if(!empty($customer->name_kh)) { ?>
                            <td>&nbsp;<?= strstr($customer->name_kh, '@', true) ?></td>
                            <?php }else { ?>
                            <td>&nbsp;<?= strstr($customer->name, '@', true) ?></td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                        <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                        <tr>
                            <td>អាសយដ្ឋាន</td>
                            <td>:</td>
                            <?php if(!empty($customer->address_kh)) { ?>
                            <td>&nbsp;<?= $customer->address_kh?></td>
                            <?php }else { ?>
                            <td>&nbsp;<?= $customer->address ?></td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                        <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                        <tr>
                            <td>ទូរស័ព្ទលេខ (Tel)</td>
                            <td>:</td>
                            <td>&nbsp;<?= $customer->phone ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-sm-5 col-xs-5" style="margin-top: -20px !important">
                    <table style="font-size: 12px;">
                        <tr>
                            <td style="width: 25%;">លេខរៀងវិក្កយបត្រ</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 30%;"><span style="font-size: 14px; font-weight: bold"><?= $invs->reference_no ?></span></td>
                        </tr>
                        <tr>
                            <td>កាលបរិច្ឆេទ</td>
                            <td>:</td>
                            <td><?= $this->erp->hrld($invs->date); ?></td>
                        </tr>
                        <tr>
                            <td>គណនីវីង:</td>
                            <td>:</td>
                            <td>018 99 777</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xs-12" style="margin-top: 10px">
                    <table style="width: 100%" cellspacing="10">
                        <tbody style="border:1px solid #000; border-radius: 5px; padding: 5px;">
                            <tr>
                                <td>Tel</td>
                                <td>: 077 55 55 88 (ផ្នែកលក់)</td>
                                <td>Tel</td>
                                <td>: 077 39 39 39 (ផ្នែកលក់)</td>
                                <td>Tel</td>
                                <td>: 077 37 38 39 (ផ្នែកលក់)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>: 089 32 68 68 (ផ្នែកលក់)</td>
                                <td></td>
                                <td>: 092 91 26 27 (ផ្នែកលក់)</td>
                                <td></td>
                                <td>: 088 33 22 888 (គណនេយ្យ)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>: 016 87 377 55 (ជាងបច្ចេកទេស)</td>
                                <td></td>
                                <td>: 098 87 37 55 (ផ្នែកឃ្លាំង)</td>
                                <td></td>
                                <td>: 023 639 6390</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <?php
                $cols = 6;
                if ($discount != 0) {
                    $cols = 7;
                }
            ?>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <table class="table table-bordered" style="margin-top: 10px;">
                        <tbody style="font-size: 11px;">
                            <tr class="thead" style="background-color: #333 !important; color: #FFF !important;">
                                <th>ល.រ<br /><?= strtoupper(lang('no')) ?></th>
                                <th>លេខកូដទំនិញ<br /><?= strtoupper(lang('product_code')) ?></th>
                                <th>បរិយាយមុខទំនិញ<br /><?= strtoupper(lang('description')) ?></th>
                                <th>ចំនួន<br /><?= strtoupper(lang('qty')) ?></th>
                                <th>តម្លៃ<br /><?= strtoupper(lang('unit_price')) ?></th>
                                
                                <?php if ($Settings->product_discount) { ?>
                                    <th>បញ្ចុះតម្លៃ<br /><?= strtoupper(lang('discount')) ?></th>
                                <?php } ?>
                                <th>តម្លៃសរុបតាមមុខទំនិញ<br /><?= strtoupper(lang('subtotal')) ?></th>
                            </tr>
                            <?php
                                $no = 1;
                                $erow = 1;
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
                                <tr>
                                    <td style="vertical-align: middle; text-align: center"><?php echo $no ?></td>
                                    <td style="vertical-align: middle;">
                                        <?=$row->product_code;?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?=$row->product_name;?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center">
                                        <?= $this->erp->formatQuantity($row->quantity);?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: right">
                                        <?= $row->real_unit_price != 0 ? $this->erp->formatMoney($row->real_unit_price) : 'Free' ?>
                                    </td>
                                    <?php if ($Settings->product_discount) { ?>
                                        <td style="vertical-align: middle; text-align: center">
                                        <?=$this->erp->formatMoney($row->item_discount);?></td>
                                    <?php } ?>
                                    <td style="vertical-align: middle; text-align: right">
                                        <?= $row->subtotal != 0 ? $this->erp->formatMoney($row->subtotal) : 'Free' ?>
                                    </td>
                                </tr>

                            <?php
                            $no++;
                            $erow++;
                            }
                            ?>
                            <?php
                                if($erow < 16){
                                    $k=16 - $erow;
                                    for($j = 1; $j <= $k; $j++){
                                        if($Settings->product_discount) {
                                            echo  '<tr>
                                                    <td height="30px" class="text-center">'.$no.'</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>';
                                        }else {
                                            echo  '<tr>
                                                    <td height="30px" class="text-center">'.$no.'</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>';
                                        }
                                        $no++;
                                    }
                                }
                            ?>
                            <?php
                                $row = 3;
                                $col =2;
                                if ($discount != 0) {
                                    $col = 3;
                                }
                                if ($invs->grand_total != $invs->total) {
                                    $row++;
                                }
                                if ($invs->order_discount != 0) {
                                    $row++;
                                    $col =2;
                                }
                                if ($invs->shipping != 0) {
                                    $row++;
                                    $col =2;
                                }
                                if ($invs->order_tax != 0) {
                                    $row++;
                                    $col =2;
                                }
                                if ($Settings->product_discount) {
                                    $col = 2;
                                }
                                if($invs->paid != 0 && $invs->deposit != 0) {
                                    $row += 3;
                                }elseif ($invs->paid != 0 && $invs->deposit == 0) {
                                    $row += 2;
                                }elseif ($invs->paid == 0 && $invs->deposit != 0) {
                                    $row += 2;
                                }
                            ?>
                                        
                            <?php if ($invs->grand_total != $invs->total) { ?>
                            <tr>
                                <td rowspan = "<?= $row; ?>" colspan="4" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                                    <?php if (!empty($invs->invoice_footer)) { ?>
                                        <!-- <p style="font-size:14px !important;"><strong><u>Note:</u></strong></p> -->
                                        <p><?= nl2br($invs->invoice_footer); ?></p>
                                    <?php } ?>
                                </td>
                                <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុប​ / <?= strtoupper(lang('total')) ?>
                                    (<?= $default_currency->code; ?>)
                                </td>
                                <td align="right"><?=$this->erp->formatMoney($invs->total); ?></td>
                            </tr>
                            <?php } ?>
                                        
                            <?php if ($invs->order_discount != 0) : ?>
                            <tr>
                                <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">បញ្ចុះតម្លៃលើការបញ្ជាទិញ / <?= strtoupper(lang('order_discount')) ?></td>
                                <td align="right"><?php echo $this->erp->formatQuantity($invs->order_discount).' $'; ?></td>
                            </tr>
                            <?php endif; ?>
                            
                            <?php if ($invs->shipping != 0) : ?>
                            <tr>
                                <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">ដឹកជញ្ជូន / <?= strtoupper(lang('shipping')) ?></td>
                                <td align="right"><?php echo $this->erp->formatQuantity($invs->shipping); ?></td>
                            </tr>
                            <?php endif; ?>
                            
                            <?php if ($invs->order_tax != 0) : ?>
                            <tr>
                                <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">ពន្ធអាករ / <?= strtoupper(lang('order_tax')) ?></td>
                                <td align="right"><?= $this->erp->formatQuantity($invs->order_tax); ?></td>
                            </tr>
                            <?php endif; ?>
                            
                            <tr>
                                <?php if ($invs->grand_total == $invs->total) { ?>
                                <td rowspan="<?= $row; ?>" colspan="4" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                                    <?php if (!empty($invs->invoice_footer)) { ?>
                                        <p style="position: absolute;"><?= nl2br($invs->invoice_footer); ?></p>
                                    <?php } ?>
                                </td>
                                <?php } ?>
                                <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">សរុបរួម / <?= strtoupper(lang('total_amount')) ?>
                                    (<?= $default_currency->code; ?>)
                                </td>
                                <td align="right"><?= $this->erp->formatMoney($invs->grand_total); ?></td>
                            </tr>
                            <?php if($invs->paid != 0 || $invs->deposit != 0){ ?>
                            <?php if($invs->deposit != 0) { ?>
                            <tr>
                                <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">បានកក់ / <?= strtoupper(lang('deposit')) ?>
                                    (<?= $default_currency->code; ?>)
                                </td>
                                <td align="right"><?php echo $this->erp->formatMoney($invs->deposit); ?></td>
                            </tr>
                            <?php } ?>
                            <?php if($invs->paid != 0) { ?>
                            <tr>
                                <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">បានបង់ / <?= strtoupper(lang('paid')) ?>
                                    (<?= $default_currency->code; ?>)
                                </td>
                                <td align="right"><?php echo $this->erp->formatMoney($invs->paid-$invs->deposit); ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="<?= $col; ?>" style="text-align: right; font-weight: bold;">នៅខ្វះ / <?= strtoupper(lang('balance')) ?>
                                    (<?= $default_currency->code; ?>)
                                </td>
                                <td align="right"><?= $this->erp->formatMoney($invs->grand_total - (($invs->paid-$invs->deposit) + $invs->deposit)); ?></td>
                            </tr>
                        <?php } ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
            <?php if($invs->note){ ?>
            <div style="border-radius: 5px 5px 5px 5px;border:1px solid black;font-size: 10px !important;margin-top: 30px !important;height: auto;" id="note" id="note" class="col-md-12 col-xs-12">
                <p style="margin-top:10px;">អ្នកចេញវិក្កយបត្រ&nbsp;:&nbsp;<strong><?php echo strip_tags($invs->note); ?></strong></p>
            </div>
            <?php } ?>
         </div>
         <div id="footer" class="row">
            <div class="col-sm-4 col-xs-4">
                <hr style="margin-bottom: 3px; border:1px solid #000; width: 80%">
                <center>
                    <p style="font-size: 10px;">ហត្ថលេខា និងឈ្មោះអ្នករៀបចំ</p>
                    <p style="margin-top:-10px;">Prepared's Signature & Name</p>
                </center>
            </div>
            <div class="col-sm-4 col-xs-4">
                <hr style="margin-bottom: 3px; border:1px solid #000; width: 80%">
                <center>
                    <p style="font-size: 10px;">ហត្ថលេខា និងឈ្មោះអ្នកលក់</p>
                    <p style="margin-top:-10px;">Seller's Signature & Name</p>
                </center>
            </div>
            <div class="col-sm-4 col-xs-4">
                <hr style="margin-bottom: 3px; border:1px solid #000; width: 80%">
                <center>
                    <p style="font-size: 10px;">ហត្ថលេខា និងឈ្មោះអ្នកទិញ</p>
                    <p style="margin-top:-10px;">Customer's Signature & Name</p>
                </center>
            </div>
        </div>

        <div style="width: 821px;margin: 20px auto;">
            <a class="btn btn-primary no-print" href="<?= site_url('sales/invoice_kc_without_ctel/'. $invs->id); ?>" target="_blank" style="border-radius: 0; margin-left: 10px">
                <i class="fa fa-print" aria-hidden="true"></i>&nbsp;<?= lang("invoice_kc_without_ctel"); ?>
            </a>
        </div>

<!-- // view -->

<?php if ($modal) {
    echo '</div></div></div></div>';
} else { ?>
<div id="buttons" style="padding-top:10px; text-transform:uppercase;" class="no-print">
    <hr>
    <?php if ($message) { ?>
    <div class="alert alert-success">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <?= is_array($message) ? print_r($message, true) : $message; ?>
    </div>
<?php } ?>
    
    <span class="pull-left col-xs-12"><a class="btn btn-block btn-success" href="#" id="email"><?= lang("email"); ?></a></span>

    <span class="col-xs-12">
        <a class="btn btn-block btn-warning" href="<?= site_url('pos'); ?>"><?= lang("back_to_pos"); ?></a>
    </span>
    <?php if (!$pos_settings->java_applet) { ?>
        <div style="clear:both;"></div>
        <div class="col-xs-12" style="background:#F5F5F5; padding:10px;">
            <p style="font-weight:bold;">Please don't forget to disble the header and footer in browser print
                settings.</p>

            <p style="text-transform: capitalize;"><strong>FF:</strong> File &gt; Print Setup &gt; Margin &amp;
                Header/Footer Make all --blank--</p>

            <p style="text-transform: capitalize;"><strong>chrome:</strong> Menu &gt; Print &gt; Disable Header/Footer
                in Option &amp; Set Margins to None</p></div>
    <?php } ?>
    <div style="clear:both;"></div>

</div>
</div><!--// container -->

</div>
<canvas id="hidden_screenshot" style="display:none;">

</canvas>
<div class="canvas_con" style="display:none;"></div>
<script type="text/javascript" src="<?= $assets ?>pos/js/jquery-1.7.2.min.js"></script>
<?php if ($pos_settings->java_applet) {
        function drawLine()
        {
            $size = $pos_settings->char_per_line;
            $new = '';
            for ($i = 1; $i < $size; $i++) {
                $new .= '-';
            }
            $new .= ' ';
            return $new;
        }

        function printLine($str, $sep = ":", $space = NULL)
        {
            $size = $space ? $space : $pos_settings->char_per_line;
            $lenght = strlen($str);
            list($first, $second) = explode(":", $str, 2);
            $new = $first . ($sep == ":" ? $sep : '');
            for ($i = 1; $i < ($size - $lenght); $i++) {
                $new .= ' ';
            }
            $new .= ($sep != ":" ? $sep : '') . $second;
            return $new;
        }

        function printText($text)
        {
            $size = $pos_settings->char_per_line;
            $new = wordwrap($text, $size, "\\n");
            return $new;
        }

        function taxLine($name, $code, $qty, $amt, $tax)
        {
            return printLine(printLine(printLine(printLine($name . ':' . $code, '', 18) . ':' . $qty, '', 25) . ':' . $amt, '', 35) . ':' . $tax, ' ');
        }

        ?>

        <script type="text/javascript" src="<?= $assets ?>pos/qz/js/deployJava.js"></script>
        <script type="text/javascript" src="<?= $assets ?>pos/qz/qz-functions.js"></script>
        <script type="text/javascript">
            deployQZ('themes/<?=$Settings->theme?>/assets/pos/qz/qz-print.jar', '<?= $assets ?>pos/qz/qz-print_jnlp.jnlp');
            usePrinter("<?= $pos_settings->receipt_printer; ?>");
            <?php /*$image = $this->erp->save_barcode($inv->reference_no);*/ ?>
            function printReceipt() {
                //var barcode = 'data:image/png;base64,<?php /*echo $image;*/ ?>';
                receipt = "";
                receipt += chr(27) + chr(69) + "\r" + chr(27) + "\x61" + "\x31\r";
                receipt += "<?= $biller->company; ?>" + "\n";
                receipt += " \x1B\x45\x0A\r ";
                receipt += "<?= $biller->address . " " . $biller->city . " " . $biller->country; ?>" + "\n";
                receipt += "<?= $biller->phone; ?>" + "\n";
                receipt += "<?php if ($pos_settings->cf_title1 != "" && $pos_settings->cf_value1 != "") { echo printLine($pos_settings->cf_title1 . ": " . $pos_settings->cf_value1); } ?>" + "\n";
                receipt += "<?php if ($pos_settings->cf_title2 != "" && $pos_settings->cf_value2 != "") { echo printLine($pos_settings->cf_title2 . ": " . $pos_settings->cf_value2); } ?>" + "\n";
                receipt += "<?=drawLine();?>\r\n";
                receipt += "<?php if($Settings->invoice_view == 1) { echo lang('tax_invoice'); } ?>\r\n";
                receipt += "<?php if($Settings->invoice_view == 1) { echo drawLine(); } ?>\r\n";
                receipt += "\x1B\x61\x30";
                receipt += "<?= printLine(lang("reference_no") . ": " . $inv->reference_no) ?>" + "\n";
                receipt += "<?= printLine(lang("sales_person") . ": " . $biller->name); ?>" + "\n";
                receipt += "<?= printLine(lang("customer") . ": " . $inv->customer); ?>" + "\n";
                receipt += "<?= printLine(lang("date") . ": " . date($dateFormats['php_ldate'], strtotime($inv->date))) ?>" + "\n\n";
                receipt += "<?php $r = 1;
            foreach ($rows as $row): ?>";
                receipt += "<?= "#" . $r ." "; ?>";
                receipt += "<?= printLine(product_name(addslashes($row->product_name)).($row->variant ? ' ('.$row->variant.')' : '').":".$row->tax_code, '*'); ?>" + "\n";
                receipt += "<?= printLine($this->erp->formatQuantity($row->quantity)."x".$this->erp->formatMoney($row->net_unit_price+($row->item_tax/$row->quantity)) . ":  ". $this->erp->formatMoney($row->subtotal), ' ') . ""; ?>" + "\n";
                receipt += "<?php $r++;
            endforeach; ?>";
                receipt += "\x1B\x61\x31";
                receipt += "<?=drawLine();?>\r\n";
                receipt += "\x1B\x61\x30";
                receipt += "<?= printLine(lang("total") . ": " . $this->erp->formatMoney($inv->total+$inv->product_tax)); ?>" + "\n";
                <?php if ($inv->order_tax != 0) { ?>
                receipt += "<?= printLine(lang("tax") . ": " . $this->erp->formatMoney($inv->order_tax)); ?>" + "\n";
                <?php } ?>
                <?php if ($inv->total_discount != 0) { ?>
                receipt += "<?= printLine(lang("discount") . ": (" . $this->erp->formatMoney($inv->product_discount).") ".$this->erp->formatMoney($inv->order_discount)); ?>" + "\n";
                <?php } ?>
                <?php if($pos_settings->rounding) { ?>
                receipt += "<?= printLine(lang("rounding") . ": " . $rounding); ?>" + "\n";
                receipt += "<?= printLine(lang("grand_total") . ": " . $this->erp->formatMoney($this->erp->roundMoney($inv->grand_total+$rounding))); ?>" + "\n";
                <?php } else { ?>
                receipt += "<?= printLine(lang("grand_total") . ": " . $this->erp->formatMoney($inv->grand_total)); ?>" + "\n";
                <?php } ?>
                <?php if($inv->paid < $inv->grand_total) { ?>
                receipt += "<?= printLine(lang("paid_amount") . ": " . $this->erp->formatMoney($inv->paid)); ?>" + "\n";
                receipt += "<?= printLine(lang("due_amount") . ": " . $this->erp->formatMoney($inv->grand_total-$inv->paid)); ?>" + "\n\n";
                <?php } ?>
                <?php
                if($payments) {
                    foreach($payments as $payment) {
                        if ($payment->paid_by == 'cash' && $payment->pos_paid) { ?>
                receipt += "<?= printLine(lang("paid_by") . ": " . lang($payment->paid_by)); ?>" + "\n";
                receipt += "<?= printLine(lang("amount") . ": " . $this->erp->formatMoney($payment->pos_paid)); ?>" + "\n";
                receipt += "<?= printLine(lang("change") . ": " . ($payment->pos_balance > 0 ? $this->erp->formatMoney($payment->pos_balance) : 0)); ?>" + "\n";
                <?php  } if (($payment->paid_by == 'CC' || $payment->paid_by == 'ppp' || $payment->paid_by == 'stripe') && $payment->cc_no) { ?>
                receipt += "<?= printLine(lang("paid_by") . ": " . lang($payment->paid_by)); ?>" + "\n";
                receipt += "<?= printLine(lang("amount") . ": " . $this->erp->formatMoney($payment->pos_paid)); ?>" + "\n";
                receipt += "<?= printLine(lang("card_no") . ": xxxx xxxx xxxx " . substr($payment->cc_no, -4)); ?>" + "\n";
                <?php } if ($payment->paid_by == 'Cheque' && $payment->cheque_no) { ?>
                receipt += "<?= printLine(lang("paid_by") . ": " . lang($payment->paid_by)); ?>" + "\n";
                receipt += "<?= printLine(lang("amount") . ": " . $this->erp->formatMoney($payment->pos_paid)); ?>" + "\n";
                receipt += "<?= printLine(lang("cheque_no") . ": " . $payment->cheque_no); ?>" + "\n";
                <?php if ($payment->paid_by == 'other' && $payment->amount) { ?>
                receipt += "<?= printLine(lang("paid_by") . ": " . lang($payment->paid_by)); ?>" + "\n";
                receipt += "<?= printLine(lang("amount") . ": " . $this->erp->formatMoney($payment->amount)); ?>" + "\n";
                receipt += "<?= printText(lang("payment_note") . ": " . $payment->note); ?>" + "\n";
                <?php }
            }

        }
    }

    if($Settings->invoice_view == 1) {
        if(!empty($tax_summary)) {
    ?>
                receipt += "\n" + "<?= lang('tax_summary'); ?>" + "\n";
                receipt += "<?= taxLine(lang('name'),lang('code'),lang('qty'),lang('tax_excl'),lang('tax_amt')); ?>" + "\n";
                receipt += "<?php foreach ($tax_summary as $summary): ?>";
                receipt += "<?= taxLine($summary['name'],$summary['code'],$this->erp->formatQuantity($summary['items']),$this->erp->formatMoney($summary['amt']),$this->erp->formatMoney($summary['tax'])); ?>" + "\n";
                receipt += "<?php endforeach; ?>";
                receipt += "<?= printLine(lang("total_tax_amount") . ":" . $this->erp->formatMoney($inv->product_tax)); ?>" + "\n";
                <?php
                    }
                }
                ?>
                receipt += "\x1B\x61\x31";
                receipt += "\n" + "<?= $biller->invoice_footer ? printText(str_replace(array('\n', '\r'), ' ', $this->erp->decode_html($biller->invoice_footer))) : '' ?>" + "\n";
                receipt += "\x1B\x61\x30";
                <?php if(isset($pos_settings->cash_drawer_cose)) { ?>
                print(receipt, '', '<?=$pos_settings->cash_drawer_cose;?>');
                <?php } else { ?>
                print(receipt, '', '');
                <?php } ?>

            }

        </script>
    <?php } ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#email').click(function () {
                        var email = prompt("<?= lang("email_address"); ?>", "<?= $customer->email; ?>");
                        if (email != null) {
                            $.ajax({
                                type: "post",
                                url: "<?= site_url('pos/email_receipt') ?>",
                                data: {<?= $this->security->get_csrf_token_name(); ?>: "<?= $this->security->get_csrf_hash(); ?>", email: email, id: <?= $inv->id; ?>},
                                dataType: "json",
                                success: function (data) {
                                    alert(data.msg);
                                },
                                error: function () {
                                    alert('<?= lang('ajax_request_failed'); ?>');
                                    return false;
                                }
                            });
                        }
                        return false;
                    });
                });
         <?php if (!$pos_settings->java_applet) { ?>
            $(window).load(function () {
                window.print();
                <?php
                if($Settings->auto_print){?>
                    setTimeout('window.close()', 5000);
                    document.location.href = "<?=base_url()?>pos";
                <?php } ?>
            });
    <?php } ?>
            </script>
</body>
</html>
<?php } ?>
