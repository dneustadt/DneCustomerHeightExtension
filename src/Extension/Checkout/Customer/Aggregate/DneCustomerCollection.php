<?php declare(strict_types=1);

namespace Dne\CustomerHeightExtension\Extension\Checkout\Customer\Aggregate;

class DneCustomerCollection
{
    protected function getExpectedClass(): string
    {
        return DneCustomerEntity::class;
    }
}
