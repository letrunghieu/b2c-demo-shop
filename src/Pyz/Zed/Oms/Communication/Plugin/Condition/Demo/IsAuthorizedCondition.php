<?php declare(strict_types = 1);

namespace Pyz\Zed\Oms\Communication\Plugin\Condition\Demo;

use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Condition\AbstractCondition;
use Spryker\Zed\Oms\Dependency\Plugin\Condition\ConditionInterface;

class IsAuthorizedCondition extends AbstractCondition implements ConditionInterface
{
    public function check(SpySalesOrderItem $orderItem)
    {
        return true;
    }
}
