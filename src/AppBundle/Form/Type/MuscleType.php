<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 *
 * @author Selim Fraoua <sfraoua@gmail.com>
 */
class MuscleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameEn')
            ->add('nameFr')
            ->add('nameSp', null, array('required'=>false))
            ->add('nameRu', null, array('required'=>false))
            ->add('nameCh', null, array('required'=>false))
            ->add('nameIt', null, array('required'=>false))
            ->add('descriptionEn', null, array('required'=>false))
            ->add('descriptionFr', null, array('required'=>false))
            ->add('descriptionSp', null, array('required'=>false))
            ->add('descriptionRu', null, array('required'=>false))
            ->add('descriptionCh', null, array('required'=>false))
            ->add('descriptionIt', null, array('required'=>false))
            ->add('Save', 'submit')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Document\Muscle',
        ));
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'muscle_type';
    }
}