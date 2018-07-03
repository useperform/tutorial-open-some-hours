<?php

namespace App\Crud;

use Perform\BaseBundle\Crud\AbstractCrud;
use Perform\BaseBundle\Config\FieldConfig;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Perform\BaseBundle\Crud\CrudRequest;

/**
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ProductCrud extends AbstractCrud
{
    protected $authChecker;

    public function __construct(AuthorizationCheckerInterface $authChecker)
    {
        $this->authChecker = $authChecker;
    }

    public function configureFields(FieldConfig $config)
    {
        if (!$this->authChecker->isGranted('ROLE_ADMIN')) {
            $config->setDefaultContexts([
                CrudRequest::CONTEXT_LIST,
                CrudRequest::CONTEXT_VIEW,
            ]);
        }

        $config->add('name', [
            'type' => 'string',
        ])->add('quantity', [
            'type' => 'integer',
        ])->add('description', [
            'type' => 'text',
        ]);

        if (!$this->authChecker->isGranted('ROLE_ADMIN')) {
            $config->add('quantity', [
                'contexts' => [
                    CrudRequest::CONTEXT_LIST,
                    CrudRequest::CONTEXT_VIEW,
                    CrudRequest::CONTEXT_EDIT,
                ],
            ]);
        }
    }
}
