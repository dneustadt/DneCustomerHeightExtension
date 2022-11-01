<?php declare(strict_types=1);

namespace Dne\CustomerHeightExtension\Extension\Checkout\Customer;

use Dne\CustomerHeightExtension\Extension\Checkout\Customer\Aggregate\DneCustomerDefinition;
use Shopware\Core\Checkout\Customer\CustomerDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class CustomerExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            (new OneToOneAssociationField('dneCustomer', 'id', 'customer_id', DneCustomerDefinition::class, true))->addFlags(new ApiAware()),
        );
    }

    public function getDefinitionClass(): string
    {
        return CustomerDefinition::class;
    }
}
