<?php

namespace App\Hyperverge\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkin;

class CheckinContactController extends Controller
{
    /**
     * @deprecated
     *
     * @param Request $request
     * @param Checkin $checkin
     * @return \Inertia\Response
     */
    public function create(Request $request, Checkin $checkin)
    {
        return inertia()->render('Contacts/Show', [
            'checkin' => fn () => $checkin->only('id', 'data_retrieved_at'),
        ]);
    }

    public function show(Request $request, Checkin $checkin)
    {
        return inertia()->render('Contacts/Show', [
            'checkin' => fn () => $checkin->only('id', 'data_retrieved_at'),
        ]);
    }
}
