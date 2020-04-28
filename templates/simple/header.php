<?php
/**
 * PDF invoice header template that will be visible on every page.
 *
 */

?>
<html>
<head>
    <style>
        .wil-notice-wrapper {
            margin-top: 30px;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box .wil-table-top tr td:nth-child(2) {
            text-align: right;
        }
        
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            /*font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;*/
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<body>
<div class="invoice-box">
    <table class="wil-table-top" cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <?php if ($this->hasLogo()) : ?>
                                <img src="<?php echo esc_url($this->getLogoUrl()); ?>"
                                     alt="<?php echo esc_attr($this->getSiteTitle()); ?>">
                            <?php else: ?>
                                <h1><?php echo esc_html($this->getSiteTitle()); ?>></h1>
                            <?php endif; ?>
                        </td>

                        <td>
                            <h4><?php echo WilokeThemeOptions::getOptionDetail('invoice_billing_date_title',
                                  'Billing Date'); ?></h4>
                            <p><?php echo $this->getBillingDate(); ?></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <h4><?php echo WilokeThemeOptions::getOptionDetail('invoice_billing_from_title',
                                  'Billing From'); ?></h4>
                            <?php
                            $aKeys   = array_keys($this->getSellerInfo());
                            $lastKey = $aKeys[count($aKeys) - 1];
                            foreach ($this->getSellerInfo() as $key => $val) {
                                if ($lastKey === $key) {
                                    echo $val;
                                } else {
                                    echo $val.'<br />';
                                }
                            }
                            ?>
                        </td>

                        <td>
                            <h4><?php echo WilokeThemeOptions::getOptionDetail('invoice_billing_to_title',
                                  'Billing To'); ?></h4>
                            <?php
                            $aKeys   = array_keys($this->getCustomerInfo());
                            $lastKey = $aKeys[count($aKeys) - 1];
                            foreach ($this->getCustomerInfo() as $key => $val) {
                                if ($lastKey === $key) {
                                    echo $val;
                                } else {
                                    echo $val.'<br />';
                                }
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
