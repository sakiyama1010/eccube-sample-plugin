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

namespace Plugin\management;

use Eccube\Common\EccubeNav;

class ManagementNav implements EccubeNav
{
    /**
     * @return array
     */
    public static function getNav()
    {
        return [
            // 勉強用
            'sample' => [
                'name' => 'サンプル管理',
                'icon' => 'fa-comment',
                'children' => [
                    'sample_master' => [
                        'name' => 'サンプル一覧',
                        'url' => 'admin_sample',
                    ],
                    'sample_edit' => [
                        'name' => 'サンプル登録',
                        'url' => 'admin_sample_new',
                    ],
                    'sample_csv_import' => [
                        'name' => 'サンプルCSV登録',
                        'url' => 'admin_sample_csv_import',
                    ]
                ]
            ],
            'customer' => [
                'name' => '顧客管理',
                'icon' => 'fa-user-tie',
                'children' => [
                    // 顧客案件管理
                    'customer_project' => [
                        'name' => 'admin.customer.customer_project_list',
                        'url' => 'admin_customer_project',
                    ],
                    // 顧客イベント管理
                    'customer_event' => [
                        'name' => 'admin.customer.customer_event_list',
                        'url' => 'admin_customer_event',
                    ],
                ],
            ],
            'member' => [
                'name' => 'メンバー管理',
                'icon' => 'fa-user',
                'children' => [
                    // TODO:メンバー(社員)管理
                    'customer_project' => [
                        'name' => 'admin.customer.customer_project_list',
                        'url' => 'admin_customer_project',
                    ],
                ],
            ],
        ];
    }
}
