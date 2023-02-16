<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use App\Repository\AddressRepository;
use App\Services\UpdateModelServices\AddressService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AddressController extends Controller
{

    public function __construct(
        private readonly AddressRepository $repository,
        private AddressService             $service
    ){}

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $addresses = $this->repository->getAll($request);

        return view('addresses.addresses', ['addresses' => $addresses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('addresses.partials.create-address-form', ['user_id' => Auth::user()->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAddressRequest $request
     * @return RedirectResponse
     */
    public function store(StoreAddressRequest $request): RedirectResponse
    {
        $this->service->store($request);

        return redirect()->route('addresses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Address $address
     * @return View
     */
    public function edit(Address $address): View
    {
        return view('addresses.partials.update-address-form', ['address' => $address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAddressRequest $request
     * @param Address $address
     * @return RedirectResponse
     */
    public function update(UpdateAddressRequest $request, Address $address): RedirectResponse
    {
        $this->service->update($request, $address);


        return redirect()->route('addresses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @return RedirectResponse
     */
    public function destroy(Request $request, Address $address): RedirectResponse
    {
        $this->service->destroy($request, $address);

        return redirect()->route('addresses.index');
    }
}
