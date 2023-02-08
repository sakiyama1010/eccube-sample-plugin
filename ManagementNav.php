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
            'management' => [
                'name' => 'テスト管理',
                'icon' => 'fa-coins',
                'children' => [
                    'management_master' => [
                        'name' => 'テスト一覧',
                        'url' => 'admin_management',
                    ],
                    'management_edit' => [
                        'name' => 'テスト登録',
                        'url' => 'admin_management_new',
                    ],
                    'management_csv_import' => [
                        'name' => 'テストCSV登録',
                        'url' => 'admin_management_csv_import',
                    ]
                ]
            ],
        ];
    }
}
