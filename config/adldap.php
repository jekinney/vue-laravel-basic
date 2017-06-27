<?php


return [
    'connections' => [
        foreach(\App\Customers\Ldap::get() as $connection) {
            $connection->customer_uid => [
                'auto_connect' => false,
                'connection' => Adldap\Connections\Ldap::class,
                'schema' => Adldap\Schemas\ActiveDirectory::class,
                'connection_settings' => [
                    'account_prefix' => $connection->prefix,
                    'account_suffix' => $connection->suffex,
                    'domain_controllers' => explode(' ', $connection->controllers),
                    'port' => $connection->port,
                    'timeout' => $connection->timeout,
                    'base_dn' => $connection->base_dn,
                    'admin_account_suffix' => $connection->admin_suffex,
                    'admin_username' => $connection->admin_username,
                    'admin_password' => env('ADLDAP_ADMIN_PASSWORD', 'password'),
                    'follow_referrals' => false,
                    'use_ssl' => false,
                    'use_tls' => false,
                ],
            ],
        }
    ],
];
