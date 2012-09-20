<?php

namespace Kunstmaan\AdminBundle\AdminList;

use Kunstmaan\AdminBundle\Entity\AbstractEntity;
use Kunstmaan\AdminListBundle\AdminList\AdminListFilter;
use Kunstmaan\AdminListBundle\AdminList\Filters\StringFilter;
use Kunstmaan\AdminListBundle\AdminList\AbstractAdminListConfigurator;

use Symfony\Component\Form\AbstractType;

/**
 * GroupAdminListConfigurator
 *
 * @todo We should probably move this to the AdminList bundle to prevent circular references...
 */
class GroupAdminListConfigurator extends AbstractAdminListConfigurator
{

    /**
     * Build filters for admin list
     *
     * @param AdminListFilter $builder
     */
    public function buildFilters(AdminListFilter $builder)
    {
        $builder->add('name', new StringFilter("name"), "Name");
    }

    /**
     * Configure the visible columns
     */
    public function buildFields()
    {
        $this->addField("name", "Name", true);
        $this->addField("roles", "Roles", false);
    }

    /**
     * Configure add action(s) of admin list
     *
     * @param array $params
     *
     * @return array
     */
    public function getAddUrlFor(array $params = array())
    {
        return array(
            'group' => array('path' => 'KunstmaanAdminBundle_settings_groups_add', 'params'=> $params)
        );
    }

    /**
     * Configure edit action(s) of admin list
     *
     * @param mixed $item
     *
     * @return array
     */
    public function getEditUrlFor($item)
    {
        return array(
            'path'   => 'KunstmaanAdminBundle_settings_groups_edit',
            'params' => array('groupId' => $item->getId())
        );
    }

    /**
     * Configure index action of admin list
     *
     * @return array
     */
    public function getIndexUrlFor()
    {
        return array('path' => 'KunstmaanAdminBundle_settings_groups');
    }

    /**
     * Configure delete action(s) of admin list
     *
     * @param mixed $item
     *
     * @return array
     */
    public function getDeleteUrlFor($item)
    {
        return array(
            'path'      => 'KunstmaanAdminBundle_settings_groups_delete',
            'params'    => array(
                'groupId'    => $item->getId()
            )
        );
    }

    /**
     * Get admin type of entity
     *
     * @param mixed $item
     *
     * @return AbstractType|null
     */
    public function getAdminType($item)
    {
        return null;
    }

    /**
     * Get repository name
     *
     * @return string
     */
    public function getRepositoryName()
    {
        return 'KunstmaanAdminBundle:Group';
    }

}
