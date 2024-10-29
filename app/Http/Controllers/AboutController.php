<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\QueryBuilders\AboutsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(AboutsQueryBuilder $aboutsQueryBuilder): View
    {
        $sectionsList = $aboutsQueryBuilder->getAboutsWithPaginathion();
        return view('about', [
            'sectionsList' => $sectionsList
        ]);
    }
}
