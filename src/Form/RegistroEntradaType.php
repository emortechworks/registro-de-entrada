<?php

namespace App\Form;

use App\Entity\RegistroEntrada;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistroEntradaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fecha_entrada')
            ->add('hora_entrada')
            ->add('nombre')
            ->add('apellido')
            ->add('identificacion')
            ->add('persona_que_visita')
            ->add('departamento_que_visita')
            ->add('motivo_de_visita')
            ->add('fecha_salida')
            ->add('hora_salida')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RegistroEntrada::class,
        ]);
    }
}
