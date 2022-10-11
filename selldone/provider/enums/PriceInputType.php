<?php
/**
 * Created by PhpStorm.
 * User: Pajuhaan
 * Date: 4/13/2019
 * Time: 10:49 AM
 */

namespace Selldone\provider\enums;


class PriceInputType
{
    const DEFAULT = 'default';
    const AREA = 'area';
    const VOLUME = 'volume';
    const CUSTOM = 'custom';


    const All=[
        self::DEFAULT,
        self::AREA,
        self::VOLUME,
        self::CUSTOM,

    ];
}
