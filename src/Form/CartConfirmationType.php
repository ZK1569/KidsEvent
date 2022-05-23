<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Purchase;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CartConfirmationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product', EntityType::class, [
                'label' => "Votre theme principal",
                'class' => Product::class,
                'choice_label' => 'name',
                'multiple' => false,
                'expanded' => false,
                'placeholder' => '--Theme--',
            ])
            ->add('fullName', TextType::class, [
                'label' => "Nom complet",
                'attr' => [
                    'placeholder' => 'Nom complet pour la livraison'
                ]
            ])
            ->add('address', TextareaType::class, [
                'label' => 'Adresse complète',
                'attr' => [
                    'placeholder' => 'Adresse complète pour la livraison'
                ]
            ])
            ->add('postalCode', IntegerType::class, [
                'label' => 'Code postal',
                'attr' => [
                    'placeholder' => 'Code postal pour le livraison'
                ] 
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville', 
                'attr' => [
                    'placeholder' => 'Ville pour la livraison'
                ]
            ])
            ->add('reserve_for', DateType::class, [
                'label' => 'Date de reservation',
                'format' => 'dd/MM/yyyy',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Purchase::class
        ]);
    }
}
