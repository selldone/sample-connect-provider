<?php
/**
 * Created by PhpStorm.
 * User: Pajuhaan
 * Date: 4/13/2019
 * Time: 10:49 AM
 */

namespace Selldone\provider\enums;


class ProductCondition
{
    const NEW = 'new';
    const REFURBISHED = 'refurbished';
    const USED = 'used';
    const USED_FAIR = 'used_fair';
    const USED_GOOD = 'used_good';
    const USED_LIKE_NEW = 'used_like_new';


    const All=[self::NEW,self::REFURBISHED,self::USED,self::USED_FAIR,self::USED_GOOD,self::USED_LIKE_NEW];
}
