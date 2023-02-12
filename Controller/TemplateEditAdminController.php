<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * https://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\management\Controller;

use Eccube\Controller\AbstractController;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Plugin\management\Repository\SampleRepository;
use Eccube\Repository\Master\PageMaxRepository;
use Eccube\Util\FormUtil;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Form;
use Plugin\management\Form\Type\Admin\SampleType;
use Plugin\management\Entity\Sample;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * 自己学習用クラス(Adminの登録修正画面)
 * @extends AbstractController ECCUBE用抽象コントローラークラス
 */
class TemplateEditAdminController extends AbstractController
{
    /**
     * 自己学習用リポジトリ
     * @var SampleRepository
     */
    protected $sampleRepository;

    /**
     * コンストラクタ
     * @param SampleRepository $sampleRepository
     */
    public function __construct(
        SampleRepository $sampleRepository
    )
    {
        $this->sampleRepository = $sampleRepository;
    }

    /**
     * 登録更新画面
     * @Route("/%eccube_admin_route%/sample/new", name="admin_sample_new", methods={"GET", "POST"})
     * @Route("/%eccube_admin_route%/sample/{id}/edit", requirements={"id" = "\d+"}, name="admin_sample_edit", methods={"GET", "POST"})
     * @Template("@management/admin/sample/edit.twig")
     * @param Request リクエスト
     * @param RouterInterface 
     * @param id 該当データのID
     */
    public function index(Request $request, RouterInterface $router, $id = null)
    {
        if (null === $id) {

            $Sample = new Sample();
        } else {
            // findメソッドは大本のServiceEntityRepositoryが提供している？？
            $Sample = $this->sampleRepository->find($id);
            if (null === $Sample) {

                throw new NotFoundHttpException("");
            }
        }

        // フォーム作成
        $builder = $this->formFactory->createBuilder(SampleType::class, $Sample);
        $editform = $builder->getForm();
        $editform->handleRequest($request);

        // 処理ボタン押下
        if ($editform->isSubmitted() && $editform->isValid()) {

            // 更新画面にリダイレクト
            return $this->redirectToRoute('admin_sample_edit', [
                'id' => $Sample->getId(),
            ]);
        }

        return [
            'form' => $editform->createView(),
            'Sample' => $Sample
        ];
    }

    /**
     * コントローラテスト
     * @Route("/%eccube_admin_route%/sample/test/{id1}/{id2}", name="admin_sample_test", methods={"GET", "POST"})
     * @param Request リクエスト
     * @param id1 該当データのID
     * @param id2 該当データのID
     */
    public function test(Request $request, $id1 = null, $id2 = null): JsonResponse
    {
        LOG_DEBUG("ログテスト", []);
        return $this->json(['response' => 'ok']);
    }
}