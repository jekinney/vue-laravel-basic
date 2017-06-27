<?php

namespace App\Http\Controllers;

use App\Customers\Ldap;
use Illuminate\Http\Request;

class LdapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ldap $ldap)
    {
        foreach($ldap->get() as $connection) {
            $results[$connection->customer_uid] = [
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
                        'admin_password' => $connection->password,
                        'follow_referrals' => false,
                        'use_ssl' => false,
                        'use_tls' => false,
                    ],
            ];
        }
        dd($results);
        return $results;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customers\Ldap  $ldap
     * @return \Illuminate\Http\Response
     */
    public function show(Ldap $ldap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customers\Ldap  $ldap
     * @return \Illuminate\Http\Response
     */
    public function edit(Ldap $ldap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customers\Ldap  $ldap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ldap $ldap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customers\Ldap  $ldap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ldap $ldap)
    {
        //
    }
}
