<?php

/*
 * This file is part of Laravel Vimeo.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Vimeo Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'client_id' => 'e902bb16e4299cb6c67b82ebbb1008e9c21e8c4f',
            'client_secret' => 'XEIR2oGRIlUg8NzMLzbVNJXlfJ+kjUcxA+E1kz6mdL1BDaQNnunLorKHElbE3M00rvcu6ZmlYWq+U5+aaJ8MDfkdyUo7yk/W4K817lKDV61UN8FBY+Dpzh6M4nY84GZm',
            'access_token' => 'ab6ed5adf90f8ef56927b3e519dc9ea2',
        ],

        'alternative' => [
            'client_id' => 'your-client-id',
            'client_secret' => 'your-client-secret',
            'access_token' => null,
        ],

    ],

];
