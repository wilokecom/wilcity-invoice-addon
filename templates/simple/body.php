<?php
/**
 * PDF invoice template body.
 *
 * This template can be overridden by copying it to
 * youruploadsfolder/woocommerce-pdf-invoices/templates/invoice/simple/yourtemplatename/body.php.
 *
 * HOWEVER, on occasion WooCommerce PDF Invoices will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @author  Bas Elbers
 * @package WooCommerce_PDF_Invoices/Templates
 * @version 0.0.1
 */
?>

<table class="wil-table-body" style="width: 100%">
    <tr class="heading" style="color:<?php echo esc_attr($this->color); ?>;">
        <?php
        foreach ($this->getColumnNames() as $key => $name) {
            $class = str_replace('_', '-', $key);
            printf(
              '<td class="%1$s" style="width: %2$s">%3$s</td>',
              esc_attr($class),
              $this->bodyColumnWidth,
              $name
            );
        }
        ?>
    </tr>
    <tr class="item">
        <?php
        foreach ($this->getColumnNames() as $key => $name) {
            $class = 'column-detail-'.str_replace('_', '-', $key);
    
            $columnVal = $this->getInvoiceData($key);
            if ($key === 'package') {
                $columnVal .= ' <small><i>('.$this->getPackageType().')</i><small>';
            }
            
            printf(
              '<td class="%1$s" style="width: %2$s">%3$s</td>',
              esc_attr($class),
              $this->bodyColumnWidth,
              $columnVal
            );
        }
        ?>
    </tr>
</table>
