<?php

namespace Peasoup\Matrixratesextension\Model\Carrier;

use Magento\Framework\Exception\LocalizedException;
use Magento\Quote\Model\Quote\Address\RateRequest;

class Matrixratemodified extends \WebShopApps\MatrixRate\Model\Carrier\Matrixrate implements    \Magento\Shipping\Model\Carrier\CarrierInterface
{

    /**
     * @param string $type
     * @param string $code
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getCode($type, $code = '')
    {

        $codes = [
            'condition_name' => [
                'package_weight' => __('Weight vs. Destination'),
                'package_value' => __('Order Subtotal vs. Destination'),
                'package_qty' => __('# of Items vs. Destination'),
                'package_weight_price' => __('Weight vs Price Vs Destination'),
            ],
            'condition_name_short' => [
                'package_weight' => __('Weight'),
                'package_value' => __('Order Subtotal'),
                'package_qty' => __('# of Items'),
                'package_weight_price' => __('Weight and Price'),
            ],
        ];

        if (!isset($codes[$type])) {
            throw new LocalizedException(__('Please correct Matrix Rate code type: %1.', $type));
        }

        if ('' === $code) {
            return $codes[$type];
        }

        if (!isset($codes[$type][$code])) {
            throw new LocalizedException(__('Please correct Matrix Rate code for type %1: %2.', $type, $code));
        }

        return $codes[$type][$code];
    }


}
