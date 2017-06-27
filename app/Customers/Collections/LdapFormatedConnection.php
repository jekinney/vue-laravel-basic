<?php

namespace App\Customers\Collections;

use App\Collections\BaseCollection;

class LdapFormatedConnection extends BaseCollection
{
	protected function setData($ldap)
	{
		return  [
          	'auto_connect' => false,
            'connection' => Adldap\Connections\Ldap::class,
            'schema' => Adldap\Schemas\ActiveDirectory::class,
            'connection_settings' => [
                'account_prefix' => $ldap->prefix,
                'account_suffix' => $ldap->suffex,
                'domain_controllers' => explode(' ', $ldap->controllers),
                'port' => $ldap->port,
                'timeout' => $ldap->timeout,
                'base_dn' => $ldap->base_dn,
                'admin_account_suffix' => $ldap->admin_suffex,
                'admin_username' => $ldap->admin_username,
                'admin_password' => $ldap->password,
                'follow_referrals' => false,
                'use_ssl' => false,
                'use_tls' => false,
            ],
		];
	}
}