<?php
namespace Appundle\Form\Type;

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
            ->add('nameSp')
            ->add('nameRu')
            ->add('nameCh')
            ->add('nameIt')
            ->add('descriptionEn')
            ->add('descriptionFr')
            ->add('descriptionSp')
            ->add('descriptionRu')
            ->add('descriptionCh')
            ->add('descriptionIt')
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