<?php

namespace Peasoup\Matrixratesextension\Block\Adminhtml\Carrier\Matrixrate;

class GridExtended extends \WebShopApps\MatrixRate\Block\Adminhtml\Carrier\Matrixrate\Grid
{

    /**
     * Prepare table columns
     *
     * @return \Magento\Backend\Block\Widget\Grid\Extended
     */
    protected function _prepareColumns()
    {

        parent::_prepareColumns();

        $this->addColumn(
            'dest_country',
            ['header' => __('Country'), 'index' => 'dest_country', 'default' => '*']
        );

        $this->addColumn(
            'dest_region',
            ['header' => __('Region/State'), 'index' => 'dest_region', 'default' => '*']
        );
        $this->addColumn(
            'dest_city',
            ['header' => __('City'), 'index' => 'dest_city', 'default' => '*']
        );
        $this->addColumn(
            'dest_zip',
            ['header' => __('Zip/Postal Code From'), 'index' => 'dest_zip', 'default' => '*']
        );
        $this->addColumn(
            'dest_zip_to',
            ['header' => __('Zip/Postal Code To'), 'index' => 'dest_zip_to', 'default' => '*']
        );

        $label = $this->matrixrate->getCode('condition_name_short', $this->getConditionName());

       if($label == 'Weight and Price') {


           $this->addColumn(
               'condition_from_value',
               ['header' => __('Weight >'), 'index' => 'condition_from_value']
           );

           $this->addColumn(
               'condition_to_value',
               ['header' => __('Weight <='), 'index' => 'condition_to_value']
           );

           $this->addColumn(
               'condition2_from_value',
               ['header' => __('Price >'), 'index' => 'condition2_from_value']
           );

           $this->addColumn(
               'condition2_to_value',
               ['header' => __('Price <='), 'index' => 'condition2_to_value']
           );
       }
       else {
           $this->addColumn(
               'condition_from_value',
               ['header' => $label.__('>'), 'index' => 'condition_from_value']
           );

           $this->addColumn(
               'condition_to_value',
               ['header' => $label.__('<='), 'index' => 'condition_to_value']
           );
       }

        $this->addColumn('price', ['header' => __('Shipping Price'), 'index' => 'price']);

        $this->addColumn(
            'shipping_method',
            ['header' => __('Shipping Method'), 'index' => 'shipping_method']
        );

        return;
    }
}
