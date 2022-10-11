<?php
/**
 * Created by PhpStorm.
 * User: Pajuhaan
 * Date: 4/13/2019
 * Time: 10:49 AM
 */

namespace Selldone\provider\enums;


class ProductType
{
    const PHYSICAL = 'PHYSICAL';
    const VIRTUAL = 'VIRTUAL';
    const SERVICE = 'SERVICE';
    const FILE = 'FILE';


    const All=[
        self::PHYSICAL,
        self::VIRTUAL,
        self::SERVICE,
        self::FILE,

    ];
}
