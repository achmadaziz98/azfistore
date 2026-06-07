<?php

function securityStatus(): array
{
    $status = [
        'active' => true,
        'label'  => 'Firewall Active',
        'icon'   => 'check', // check | warning
    ];

    // CSRF
    if (! config('Security')->csrfProtection) {
        $status['active'] = false;
    }

    // Auth filter
    $filters = config('Filters')->aliases;
    if (! isset($filters['auth'])) {
        $status['active'] = false;
    }

    // HTTPS
    if (! request()->isSecure()) {
        $status['active'] = false;
    }

    if (! $status['active']) {
        $status['label'] = 'Firewall Inactive';
        $status['icon']  = 'warning';
    }

    return $status;
}
