<?php
/**
 * PDF invoice footer template that will be visible on every page.
 *
 * This template can be overridden by copying it to
 * youruploadsfolder/woocommerce-pdf-invoices/templates/invoice/simple/yourtemplatename/footer.php.
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

$noticeTitle = WilokeThemeOptions::getOptionDetail('invoice_notice_title');
$noticeDesc  = WilokeThemeOptions::getOptionDetail('invoice_notice_description');

?>
<?php if (!empty($noticeTitle) || !empty($noticeDesc)) : ?>
    <div class="wil-notice-wrapper">
        <?php if (!empty($noticeTitle)) {
            echo '<strong class="wil-notice-title">'.nl2br($noticeTitle).'</strong>: ';
        } ?>
        <?php if (!empty($noticeDesc)) {
            echo nl2br($noticeDesc);
        } ?>
    </div>
<?php endif; ?>
</div>
</body>
</html>
