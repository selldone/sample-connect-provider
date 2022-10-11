<?php
/**
 * Created by PhpStorm.
 * User: Pajuhaan
 * Date: 2/26/2020
 * Time: 11:55 AM
 */

namespace Selldone\provider\enums;


class ProductPricing
{
    const FIX = 'FIX';                      // Fix price    (Physical, Virtual, File, Service)
    const ESTIMATION = 'ESTIMATION';        // Set price in pre-checkout by seller and can be change in future (Service only)
    const AGREEMENT = 'AGREEMENT';          // Set final price in pre-checkout by seller (Service only)
    const BID = 'BID';                      // Bid on product by buyer (Higher win) -> Disable now



    const All=[self::FIX,self::ESTIMATION,self::AGREEMENT,self::BID];
}
