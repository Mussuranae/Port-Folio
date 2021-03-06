<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('lastname')
            ->add('firstname')
            ->add('address', null, ['required' => false])
            ->add('zipCode', IntegerType::class, ['required' => false])
            ->add('city', null, ['required' => false])
            ->add('phoneNumber', null, ['required' => false])
            ->add('introduction', TextareaType::class, ['required' => false])
            ->add('interest', TextareaType::class, ['required' => false])
            ->add('gitHubLink')
            ->add('linkedinLink')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
