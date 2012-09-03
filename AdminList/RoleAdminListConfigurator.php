<?php

namespace Kunstmaan\AdminBundle\AdminList;

use Kunstmaan\AdminListBundle\AdminList\AdminListFilter;
use Kunstmaan\AdminListBundle\AdminList\FilterDefinitions\StringFilterType;
use Kunstmaan\AdminListBundle\AdminList\AbstractAdminListConfigurator;

/**
 * @todo We should probably combine Admin & AdminList into 1 bundle, or move this to the AdminList bundle to prevent circular references...
 */
class RoleAdminListConfigurator extends AbstractAdminListConfigurator
{

    /**
     * @param AdminListFilter $builder
     */
    public function buildFilters(AdminListFilter $builder)
    {
        $builder->add('role', new StringFilterType("role"), "Role");
    }

    /**
     *
     */
    public function buildFields()
    {
        $this->addField("role", "Role", true);
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function getAddUrlFor($params = array())
    {
        return array(
            'role' => array('path' => 'KunstmaanAdminBundle_settings_roles_add', 'params' => $params)
        );
    }

    /**
     * @param mixed $item
     *
     * @return array
     */
    public function getEditUrlFor($item)
    {
        return array(
            'path'   => 'KunstmaanAdminBundle_settings_roles_edit',
            'params' => array('roleId' => $item->getId())
        );
    }

    /**
     * @return array
     */
    public function getIndexUrlFor()
    {
        return array('path' => 'KunstmaanAdminBundle_settings_roles');
    }

    /**
     * @param mixed $item
     *
     * @return AbstractType|null
     */
    public function getAdminType($item)
    {
        return null;
    }

    /**
     * @param mixed $item
     *
     * @return array
     */
    public function getDeleteUrlFor($item)
    {
        return array(
            'path'      => 'KunstmaanAdminBundle_settings_roles_delete',
            'params'    => array(
                'roleId'    => $item->getId()
            )
        );
    }

    /**
     * @return string
     */
    public function getRepositoryName()
    {
        return 'KunstmaanAdminBundle:Role';
    }

}
