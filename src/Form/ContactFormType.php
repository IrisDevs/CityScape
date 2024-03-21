<?php

namespace App\Form;

use App\Entity\Form;

use Symfony\Component\Form\AbstractType;
// use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Ecrire votre nom',
                    'class' => 'common-input'
                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre nom'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre nom devrait avoir au moins {{ limit }} charactères'

                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => 'Ecrire votre E-mail',
                    'class' => 'common-input'
                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre E-mail'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre Email devrait avoir au moins {{ limit }} charactères'

                    ])
                ]
            ])
            ->add('number', TextType::class, [
                'attr' => [
                    'placeholder' => 'Ecrire votre numéro de téléphone',
                    'class' => 'common-input'
                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre numéro de téléphone'
                    ]),
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Votre numéro de téléphone devrait avoir { limit }} chiffres'

                    ])
                ]
            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'placeholder' => 'Ecrire le sujet du message',
                    'class' => 'common-input'
                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez le sujet du message'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le sujet du message devrait avoir au moins {{ limit }} charactères'

                    ])
                ]
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Ecrire votre message',
                    'class' => 'common-input'
                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre message'
                    ]),
                    new Length([
                        'min' => 20,
                        'minMessage' => 'Votre Message devrait avoir au moins {{ limit }} charactères'

                    ])
                ]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Form::class,
        ]);
    }
}