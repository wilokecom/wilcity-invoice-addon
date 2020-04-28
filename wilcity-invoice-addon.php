<?php
/**
 * Plugin Name: Wilcity Invoice Addon
 * Author: Wilcity
 * Author URI: https://wilcityservice.com
 * Author URI: https://wilcityservice.com
 * Description: Allow to download Payment Invoice
 *Version: 1.0
 */

add_action('wiloke-listing-tools/run-extension', 'wilcityInvoiceAddonLoad');

function wilcityReplaceDefaultInvoiceMachineWithMe()
{
    return '\WilcityInvoiceAddon\Controllers\InvoiceMPDFExtension';
}

function wilcityInvoiceAddonLoad()
{
    require_once plugin_dir_path(__FILE__)."vendor/autoload.php";
    
    define('WILCITY_INVOICE_ADDON_DIR', plugin_dir_path(__FILE__));
    define('WILCITY_INVOICE_ADDON_URL', plugin_dir_url(__FILE__));
    define('WILCITY_INVOICE_ADDON_TEMPLATE_DIR', WILCITY_INVOICE_ADDON_DIR.'templates/');
    
    if (is_admin()) {
        new \WilcityInvoiceAddon\Controllers\ThemeOptions();
    }
    
    add_filter('wilcity/filter/wiloke-listing-tools/invoice/printer-machine',
      'wilcityReplaceDefaultInvoiceMachineWithMe');
}

