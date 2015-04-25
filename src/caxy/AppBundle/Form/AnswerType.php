<?php

namespace caxy\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('answer', 'textarea')
            ->add('save', 'submit', array('label' => 'Submit Answer'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'caxy\AppBundle\Entity\Answer'
        ));
    }

    public function getName()
    {
        return 'answer';
    }
}
