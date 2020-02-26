<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\Questions;
use App\Entity\Bonus;
use App\Repository\AnswerRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizzType extends AbstractType

{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question_id',HiddenType::class)

            ->add('answer', ChoiceType::class, array(
                'choices'=> $options['answers'],
                'multiple'=>false,
                'expanded'=>true,
                'choice_label' => function(?Answer $answer) {
                    return $answer ? strtoupper($answer->getAnswer()) : '';
                }
            ))
            ->add('submit',SubmitType::class,[
                'label'=> "Valider",
                'attr'=>['class'=>"liens"]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'answers'=> array(),
            'data_class'=> null,
            'allow_extra_fields'=>true
            // Configure your form options here
        ]);
    }
}
