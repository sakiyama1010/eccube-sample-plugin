<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\management\Form\Type\Admin;

use Eccube\Common\EccubeConfig;
use Plugin\management\Repository\SampleRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
// これがないと`$builder->getForm();`で怒られる
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class SampleType extends AbstractType
{
    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * @var SampleRepository
     */
    protected $SampleRepository;

    /**
     * SearchSampleType constructor.
     *
     * @param EccubeConfig $eccubeConfig
     * @param SampleRepository $SampleRepository
     */
    public function __construct(
        SampleRepository $SampleRepository,
        EccubeConfig $eccubeConfig
    ) {
        $this->eccubeConfig = $eccubeConfig;
        $this->SampleRepository = $SampleRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $months = range(1, 12);
        $builder
            ->add('name', TextType::class, [
                'label' => 'admin.sample.name',
                'required' => false,
                'constraints' => [
                    new Assert\Length(['max' => $this->eccubeConfig['eccube_stext_len']]),
                ],
            ])
            ->add('detail', TextType::class, [
                'label' => 'admin.sample.detail',
                'required' => false,
                'constraints' => [
                    new Assert\Length(['max' => $this->eccubeConfig['eccube_stext_len']]),
                ],
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'admin_sample';
    }
}
