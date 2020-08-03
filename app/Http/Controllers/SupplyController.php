<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use App\Product;

class SupplyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $provider = new Provider();
        $product = new Product();

        $providerList = $provider->index();
        $productList = $product->index();
        $providersWithMoreThanOneSupply = $provider->getProvidersWithMoreThanOneSupply();

        return view('supply', compact('providerList', 'productList', 'providersWithMoreThanOneSupply'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $provider = Provider::find($request->provider);
        $provider->products()->attach($request->product);
        return redirect()->route('supplies.create')->with('status', 'Поставка успешно добавлена');
    }
}
