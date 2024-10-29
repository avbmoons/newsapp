<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\QueryBuilders\HomesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(HomesQueryBuilder $homesQueryBuilder): View
    {
        $sectionsList = $homesQueryBuilder->getHomesWithPaginathion();
        return view('index', [
            'sectionsList' => $sectionsList
        ]);
    }
}
