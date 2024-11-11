<?php

namespace App\Hyperverge\Enums;

enum HypervergeModule: string
{
    case ID_VERIFICATION = 'module_id';
    case SELFIE_VERIFICATION = 'module_selfie';
    case SELFIE_ID_MATCH = 'module_facematch';

    //NOTE: added 29 Sep 2021
//    case ID_VERIFICATION = 'module_id_card_validation';
//    case SELFIE_VERIFICATION = 'module_selfie_validation';
//    case SELFIE_ID_MATCH = 'module_selfie_id_match_api';
}
