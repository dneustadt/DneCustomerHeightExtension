import template from './template.html.twig';

const { Component } = Shopware;

Component.override('sw-customer-card', {
    template,

    inject: ['repositoryFactory'],

    computed: {
        dneHeight: {
            get() {
                return this.customer.extensions.dneCustomer?.height ?? null;
            },
            set(value) {
                if (!this.customer.extensions.dneCustomer) {
                    this.$set(this.customer.extensions, 'dneCustomer', this.repositoryFactory.create('dne_customer').create());
                }

                this.$set(this.customer.extensions.dneCustomer, 'height', value);
            },
        },
    }
});
