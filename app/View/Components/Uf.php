<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\UfService;

class Uf extends Component
{
    public float|null $valorUf;

    public function __construct()
    {
        $this->valorUf = (new UfService())->obtenerValorUf();
    }

    public function render()
    {
        return view('components.uf');
    }
}