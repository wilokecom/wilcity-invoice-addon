<?php
namespace WilcityInvoiceAddon\Controllers;

use Mpdf\Mpdf;
use Mpdf\MpdfException;
use WilokeListingTools\Framework\Invoice\InvoiceAbstract;
use WilokeListingTools\Framework\Invoice\InvoiceInterface;

class InvoiceMPDFExtension extends InvoiceAbstract implements InvoiceInterface
{
    /**
     * @param $aInvoiceData
     * @param $aArgs
     *
     * @return void|InvoiceInterface
     */
    public function setup($aInvoiceData, $aArgs)
    {
        $this->parentSetup($aInvoiceData, $aArgs);
        
        return $this;
    }
    
    private function getFile($file)
    {
        return WILCITY_INVOICE_ADDON_TEMPLATE_DIR.'simple/'.$file.'.php';
    }
    
    public function print()
    {
        ob_start();
        include $this->getFile('header');
        include $this->getFile('body');
        include $this->getFile('footer');
        $content = ob_get_contents();
        ob_end_clean();
        try {
            $aArgs = [
              'margin_top'    => 27,
              'margin_bottom' => 25,
              'margin_header' => 16,
              'margin_footer' => 13
            ];
            
            if ($font = \WilokeThemeOptions::getOptionDetail('invoice_font')) {
                $aArgs['default_font'] = $font;
            }
            
            $oMpdf = new Mpdf(apply_filters('wilcity/filter/wilcity-invoice/addon/configuration', $aArgs));
            
            if ($watermark = \WilokeThemeOptions::getOptionDetail('invoice_badge')) {
                $oMpdf->SetWatermarkText($watermark);
                $oMpdf->showWatermarkText = true;
            }
            
            if (is_rtl()) {
                $oMpdf->SetDirectionality('rtl');
            }
            
            $oMpdf->SetDisplayMode('fullpage');
            
            $oMpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
            $oMpdf->WriteHTML($content);
            $oMpdf->Output($this->getFileName(), $this->getOutputType());
            
            return true;
        } catch (MpdfException $e) {
            if (defined('WP_DEBUG') && WP_DEBUG) {
                echo $e->getMessage();
                die;
            }
        }
    }
}
