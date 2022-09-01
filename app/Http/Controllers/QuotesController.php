<?php

namespace App\Http\Controllers;

use App\Services\QuotesService;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    /**
     * @var QuotesService
     */
    private $quotesService;

    public function __construct(QuotesService $quotesService)
    {
       $this->quotesService = $quotesService;
    }

    public function get(Request $request, $date)
    {
        return $this->quotesService->get($date);
    }
}
