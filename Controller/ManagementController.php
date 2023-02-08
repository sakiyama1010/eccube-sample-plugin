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


class ManagementController extends AbstractController
{

    protected $csvExportService;
    protected $pageMaxRepository;

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
     * @Route("/%eccube_admin_route%/management", name="admin_management", methods={"GET"})
     * @Route("/%eccube_admin_route%/management/page/{page_no}", requirements={"page_no" = "\d+"}, name="admin_management_page", methods={"GET", "POST"})
     * @Template("@Nmanagement/admin/management/index.twig")
     */
    public function index(Request $request, PaginatorInterface $paginator, $page_no = null)
    {
        return [];
    }

    /**
     * 登録画面
     * @Route("/%eccube_admin_route%/management/new", name="admin_management_new", methods={"GET", "POST"})
     * @Route("/%eccube_admin_route%/management/{id}/edit", requirements={"id" = "\d+"}, name="admin_management_edit", methods={"GET", "POST"})
     * @Template("@management/admin/management/edit.twig")
     */
    public function edit(Request $request)
    {
        return [];
    }

    /**
     * CSV登録画面
     *
     * @Route("/%eccube_admin_route%/management/management_csv_upload", name="admin_management_csv_import", methods={"GET", "POST"})
     * @Template("@management/admin/management/csv_management.twig")
     */
    public function csvmanagement(Request $request)
    {
        return [];
    }

    /**
     * CSV出力処理
     *
     * @Route("/%eccube_admin_route%/management/export", name="admin_management_export", methods={"GET"})
     *
     * @param Request $request
     *
     * @return StreamedResponse
     */
    public function export(Request $request)
    {
        // TODO:一旦処理なし
    }
}