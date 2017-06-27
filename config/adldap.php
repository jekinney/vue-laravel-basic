<?php
return [
    'connections' => [
        'default' => [
            'auto_connect' => false,
            'connection' => Adldap\Connections\Ldap::class,
            'schema' => Adldap\Schemas\ActiveDirectory::class,
            'connection_settings' => [
                'account_prefix' => '',
                'account_suffix' => '',
                'domain_controllers' => '',
                'port' => 589,
                'timeout' => 5,
                'base_dn' => '',
                'admin_account_suffix' => '',
                'admin_username' => 'username',
                'admin_password' =>  'password',
                'follow_referrals' => false,
                'use_ssl' => false,
                'use_tls' => false,
            ],
        ],
    ],
];

