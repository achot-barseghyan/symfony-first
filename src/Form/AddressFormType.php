<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'address name'
            ])
            ->add('company', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false,
            ])
            ->add('address', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('complement', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false,
            ])
            ->add('phone', IntegerType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('city', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('zipCode', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('country', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
