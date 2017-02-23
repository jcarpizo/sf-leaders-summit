<?php

namespace Globe\LeadersSummitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ParticipantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('avatar', FileType::class, [
            'data_class' => null
        ])->add('mobileNo')->add('employeeNo')->add('designation')->add('email')->add('firstName')->add('lastName')->add('gender',
            ChoiceType::class, array(
                'choices' => array(
                    'm' => 'Male',
                    'f' => 'Female'
                ),
                'required' => true,
                'placeholder' => 'Choose your gender'
            ))->add('googleId');
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
