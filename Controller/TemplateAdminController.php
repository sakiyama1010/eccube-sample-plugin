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
use Eccube\Repository\Master\PageMaxRepository;
use Eccube\Service\CsvExportService;
use Eccube\Util\FormUtil;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Form;

/**
 * 自己学習用クラス(Admin)
 * @extends AbstractController ECCUBE用抽象コントローラークラス
 */
class TemplateAdminController extends AbstractController
{
    /**
     * CSV出力用サービス
     * @var CsvExportService
     */
    protected $csvExportService;

    /**
     * ページの最大件数操作用リポジトリ
     * @var PageMaxRepository
     */
    protected $pageMaxRepository;

    /**
     * コンストラクタ
     * @param PageMaxRepository $pageMaxRepository
     * @param CsvExportService $csvExportService
     */
    public function __construct(
        PageMaxRepository $pageMaxRepository,
        CsvExportService $csvExportService
    )
    {
        $this->pageMaxRepository = $pageMaxRepository;
        $this->csvExportService = $csvExportService;
    }

    /**
     * 一覧画面
     * @Route("/%eccube_admin_route%/sample", name="admin_sample", methods={"GET"})
     * @Route("/%eccube_admin_route%/sample/page/{page_no}", requirements={"page_no" = "\d+"}, name="admin_sample_page", methods={"GET", "POST"})
     * @Template("@management/admin/sample/index.twig")
     * @param Request リクエスト
     * @param PaginatorInterface ページングIF
     * @param page_no ページ番号
     */
    public function index(Request $request, PaginatorInterface $paginator, $page_no = null)
    {

        // pagination:ページング情報
        // has_errors:処理内容にエラーがあったかどうか
        return [
            'pagination' => [],
            'has_errors' => false,
        ];
    }

    /**
     * 登録画面
     * @Route("/%eccube_admin_route%/sample/new", name="admin_sample_new", methods={"GET", "POST"})
     * @Route("/%eccube_admin_route%/sample/{id}/edit", requirements={"id" = "\d+"}, name="admin_sample_edit", methods={"GET", "POST"})
     * @Template("@management/admin/sample/edit.twig")
     */
    public function edit(Request $request)
    {
        return [];
    }

    /**
     * CSV登録画面
     *
     * @Route("/%eccube_admin_route%/sample/sample_csv_upload", name="admin_sample_csv_import", methods={"GET", "POST"})
     * @Template("@management/admin/sample/csv_sample.twig")
     */
    public function csvsample(Request $request)
    {
        return [];
    }

    /**
     * CSV出力処理
     *
     * @Route("/%eccube_admin_route%/sample/export", name="admin_sample_export", methods={"GET"})
     *
     * @param Request $request
     *
     * @return StreamedResponse
     */
    public function export(Request $request)
    {
    }

    /**
     * アップロード用CSV雛形ファイルダウンロード
     *
     * @Route("/%eccube_admin_route%/sample/csv_template/{type}", requirements={"type" = "\w+"}, name="admin_sample_csv_template", methods={"GET"})
     *
     * @param $type
     *
     * @return StreamedResponse
     */
    public function csvTemplate(Request $request, $type)
    {
    }
}