<?php

namespace App\Crud;

use Perform\BaseBundle\Crud\AbstractCrud;
use Perform\BaseBundle\Config\FieldConfig;

/**
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ProductCrud extends AbstractCrud
{
    public function configureFields(FieldConfig $config)
    {
        $config->add('name', [
            'type' => 'string',
        ])->add('quantity', [
            'type' => 'integer',
        ])->add('description', [
            'type' => 'text',
        ]);
    }
}
