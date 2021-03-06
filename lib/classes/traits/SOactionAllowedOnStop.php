<?php

/**
 * Trait SOactionAllowedOnStop
 *
 * @package uzerp
 * @author uzERP LLP and Steve Blamey <blameys@blueloop.net>
 * @license GPLv3 or later
 * @copyright (c) 2017 uzERP LLP (support#uzerp.com). All rights reserved.
 *
 * @see SordersController
 * @see SorderlinesController
 */
trait SOactionAllowedOnStop
{

    /**
     * @param SLCustomer $customer SLCustomer instance
     * @return bool
     */
    private function actionAllowedOnStop($customer)
    {
        try {
            // Get module preferences
            $system_prefs = SystemPreferences::instance();
            $pref = $system_prefs->getPreferenceValue('disable-orders-stopped', 'sales_order');
            
            if ($pref === 'off' || $pref === '') {
                return true;
            }

            if (get_class($customer) != 'SLCustomer') {
                throw new Exception('SordersController::actionAllowedOnStop: Invalid parameter value, function requires SLCustomer instance.');
            }

            if ($customer->accountStopped() && $pref === 'on') {
                return false;
            }

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>
