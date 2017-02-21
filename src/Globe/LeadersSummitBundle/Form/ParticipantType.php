<?php

namespace Globe\LeadersSummitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('employeeNo')->add('designation')->add('email')->add('firstName')->add('lastName')->add('avatar')->add('mobileNo')->add('gender')->add('googleId')->add('createdAt')->add('updatedAt')->add('deletedAt')->add('createdBy')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Globe\LeadersSummitBundle\Entity\Participant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'globe_leaderssummitbundle_participant';
    }


}
