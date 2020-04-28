<?php

namespace WilcityInvoiceAddon\Controllers;

class ThemeOptions
{
    public function __construct()
    {
        add_filter('wilcity/filter/wiloke-listing-tools/invoice-theme-options', [$this, 'addThemeOptionSettings']);
    }
    
    public function addThemeOptionSettings($aConfig)
    {
        $aThemeOptions     = require_once WILCITY_INVOICE_ADDON_DIR.'configs/themeoptions.php';
        $aConfig['fields'] = array_merge($aConfig['fields'], $aThemeOptions);
        
        return $aConfig;
    }
}
