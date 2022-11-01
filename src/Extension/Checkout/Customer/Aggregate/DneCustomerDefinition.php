<?php declare(strict_types=1);

namespace Dne\CustomerHeightExtension\Extension\Checkout\Customer\Aggregate;

use Shopware\Core\Checkout\Customer\CustomerDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FloatField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class DneCustomerDefinition extends EntityDefinition
{
    public function getEntityName(): string
    {
        return 'dne_customer';
    }

    public function getCollectionClass(): string
    {
        return DneCustomerCollection::class;
    }

    public function getEntityClass(): string
    {
        return DneCustomerEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            (new FkField('customer_id', 'customerId', CustomerDefinition::class))->addFlags(new Required()),
            new OneToOneAssociationField('customer', 'customer_id', 'id', CustomerDefinition::class, false),
            new FloatField('height', 'height'),
        ]);
    }
}
