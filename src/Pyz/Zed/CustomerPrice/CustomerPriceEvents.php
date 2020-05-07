<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice;

interface CustomerPriceEvents
{
    public const CUSTOMER_PRICE_PARSED = 'CustomerPrice.customer_price.after.parse';
    public const CUSTOMER_PRICE_SAVED = 'CustomerPrice.customer_price.after.save';
}
