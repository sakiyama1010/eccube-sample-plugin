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

namespace Plugin\management\Controller\Admin\Customer;

use Eccube\Controller\AbstractController;
use Eccube\Repository\Master\PageMaxRepository;
use Plugin\management\Repository\Customer\CustomerEventRepository;
use Eccube\Util\FormUtil;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Form;
use Plugin\management\Form\Type\Admin\Customer\CustomerEventType;

class CustomerController extends AbstractController
{

    /**
     * @var PageMaxRepository
     */
    protected $pageMaxRepository;

    /**
     * @var CustomerEventRepository
     */
    protected $customerEventRepository;

    /**
     * @param PageMaxRepository $pageMaxRepository
     * @param CustomerEventRepository $customerEventRepository
     */
    public function __construct(
        PageMaxRepository $pageMaxRepository,
        CustomerEventRepository $customerEventRepository
    )
    {
        $this->pageMaxRepository = $pageMaxRepository;
        $this->customerEventRepository = $customerEventRepository;
    }

    /**
     * 顧客イベント一覧
     * @Route("/%eccube_admin_route%/customer/event", name="admin_customer_event", methods={"GET"})
     * @Route("/%eccube_admin_route%/customer/event/page/{page_no}", requirements={"page_no" = "\d+"}, name="admin_customer_event_page", methods={"GET", "POST"})
     * @Template("@management/admin/Customer/event/index.twig")
     */
    public function eventIndex(Request $request, PaginatorInterface $paginator, $page_no = null)
    {
        $session = $this->session;
        $builder = $this->formFactory->createBuilder(CustomerEventType::class);
        $searchForm = $builder->getForm();
        $pageMaxis = $this->pageMaxRepository->findAll();
        $pageCount = $session->get('eccube.admin.customer_event.search.page_count', $this->eccubeConfig['eccube_default_page_count']);
        $pageCountParam = $request->get('page_count');
        if ($pageCountParam && is_numeric($pageCountParam)) {
            foreach ($pageMaxis as $pageMax) {
                if ($pageCountParam == $pageMax->getName()) {
                    $pageCount = $pageMax->getName();
                    $session->set('eccube.admin.customer_event.search.page_count', $pageCount);
                    break;
                }
            }
        }

        if ('POST' === $request->getMethod()) {

            $searchForm->handleRequest($request);
            if ($searchForm->isValid()) {

                $searchData = $searchForm->getData();
                $page_no = 1;
                $session->set('eccube.admin.customer_event.search', FormUtil::getViewData($searchForm));
                $session->set('eccube.admin.customer_event.search.page_no', $page_no);
            } else {
                log_info($searchForm->getErrors(true));
                return [
                    'searchForm' => $searchForm->createView(),
                    'pagination' => [],
                    'pageMaxis' => $pageMaxis,
                    'page_no' => $page_no,
                    'page_count' => $pageCount,
                    'has_errors' => true,
                ];
            }
        } else {
            if (null !== $page_no || $request->get('resume')) {
                if ($page_no) {
                    $session->set('eccube.admin.customer_event.search.page_no', (int) $page_no);
                } else {
                    $page_no = $session->get('eccube.admin.customer_event.search.page_no', 1);
                }
                $viewData = $session->get('eccube.admin.customer_event.search', []);
            } else {
                $page_no = 1;
                $viewData = FormUtil::getViewData($searchForm);
                $session->set('eccube.admin.sacustomer_eventmple.search', $viewData);
                $session->set('eccube.admin.customer_event.search.page_no', $page_no);
            }
            $searchData = FormUtil::submitAndGetData($searchForm, $viewData);
        }

        $qb = $this->customerEventRepository->getQueryBuilderBySearchData($searchData);

        $pagination = $paginator->paginate(
            $qb,
            $page_no,
            $pageCount
        );

        return [
            'searchForm' => $searchForm->createView(),
            'pagination' => $pagination,
            'pageMaxis' => $pageMaxis,
            'page_no' => $page_no,
            'page_count' => $pageCount,
            'has_errors' => false,
        ];
    }

    /**
     * 顧客案件一覧
     * @Route("/%eccube_admin_route%/customer/project", name="admin_customer_project", methods={"GET"})
     * @Route("/%eccube_admin_route%/customer/project/page/{page_no}", requirements={"page_no" = "\d+"}, name="admin_customer_project_page", methods={"GET", "POST"})
     * @Template("@management/admin/Customer/project/index.twig")
     */
    public function projectIndex(Request $request, PaginatorInterface $paginator, $page_no = null)
    {
        return [];
    }

    /**
     * 顧客イベント登録
     * @Route("/%eccube_admin_route%/customer/event/new", name="admin_customer_event_new", methods={"GET", "POST"})
     * @Route("/%eccube_admin_route%/customer/event/{id}/edit", requirements={"id" = "\d+"}, name="admin_customer_event_edit", methods={"GET", "POST"})
     * @Template("@management/admin/Customer/event/edit.twig")
     */
    public function eventEdit(Request $request)
    {
        return [];
    }

    /**
     * 顧客イベント登録
     * @Route("/%eccube_admin_route%/customer/project/new", name="admin_customer_project_new", methods={"GET", "POST"})
     * @Route("/%eccube_admin_route%/customer/project/{id}/edit", requirements={"id" = "\d+"}, name="admin_customer_project_edit", methods={"GET", "POST"})
     * @Template("@management/admin/Customer/project/edit.twig")
     */
    public function projectEdit(Request $request)
    {
        return [];
    }
}