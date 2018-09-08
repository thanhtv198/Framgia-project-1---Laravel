<?php

return [
    //user
    'user' => [
        'remove' => [
            'inactive' => 1,
            'active' => 0,
        ],
        'role' => [
            'super_admin' => 1,
            'manager' => 2,
            'member' => 3
        ],
    ],

    //topic
    'product' => [
        'status' => [
            'inactive' => 1,
            'active' => 0,
            'reject' => 2,
        ],
        'remove' => [
            'inactive' => 1,
            'active' => 0,
        ],
        'unit' => 1000000,
    ],

    //post
    'order' => [
        'status' => [
            'inactive' => 1,
            'active' => 0,
        ],
        'remove' => [
            'inactive' => 1,
            'active' => 0,
        ],
    ],

    //
    'order_detail' => [
        'status' => [
            'inactive' => 1,
            'active' => 0,
            'cancel' => 2,
        ],
        'remove' => [
            'inactive' => 1,
            'active' => 0,
        ],
    ],
    'buyer_id' => 0,
    'respond' => [
        'status' => [
            'inactive' => 1,
            'active' => 0,
        ],
    ]

];