<?php

namespace Kunstmaan\AdminBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * UserType defines the form used for {@link User}
 */
class UserType extends AbstractType implements RoleDependentUserFormInterface
{

    private $canEditAllFields = false;
    private $langs = [];

    public function setLangs(array $langs) {
        $this->langs = $langs;
    }

    /**
     * Setter to check if we can display all form fields
     *
     * @param $canEditAllFields
     * @return bool
     */
    public function setCanEditAllFields($canEditAllFields)
    {
        $this->canEditAllFields = (bool)$canEditAllFields;
    }



    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('username', 'text', array ('required' => true, 'label' => 'settings.user.username'))
                ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'required' => $options['password_required'],
                    'invalid_message' => "errors.password.dontmatch",
                    'first_options' => array(
                        'label' => 'settings.user.password'
                    ),
                    'second_options' => array(
                        'label' => 'settings.user.repeatedpassword'
                    )
                    )
                )
                ->add('email', 'email', array ('required' => true, 'label' => 'settings.user.email'))
                ->add('localeAdmin', 'choice', array(
                    'choices'   => $this->langs,
                    'required'  => true,
                ));

        if ($this->canEditAllFields) {
            $builder->add('enabled', 'checkbox', array('required' => false, 'label' => 'settings.user.enabled'))
                    ->add('groups', 'entity', array(
                            'label' => 'settings.user.roles',
                            'class' => 'KunstmaanAdminBundle:Group',
                            'query_builder' => function(EntityRepository $er) {
                                return $er->createQueryBuilder('g')
                                    ->orderBy('g.name', 'ASC');
                            },
                            'multiple' => true,
                            'expanded' => false,
                            'required' => false,
                            'attr' => array(
                                'class' => 'chzn-select',
                                'data-placeholder' => 'Choose the permission groups...'
                            )
                        )
                    )
                    ->add('localeAdmin', 'choice', array(
                        'choices'   => $this->langs,
                        'required'  => true,
                    ));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('password_required' => false));
        $resolver->addAllowedValues(array('password_required' => array(true, false)));
    }

}
