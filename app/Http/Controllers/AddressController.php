<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Repository\AddressRepository;
use App\Repository\AddressRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddressController extends Controller
{

    public function __construct(
        private readonly AddressRepository $repository
    ){}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request): Response
    {
        $addresses = $this->repository->getAll($request);

        return response($addresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Address $address
     * @return Response
     */
    public function show(Request $request, Address $address): Response
    {
        $userAddress = $this->repository->getById($request, $address);

        return response($userAddress);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Address $address
     * @return Response
     */
    public function edit(Address $address): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Address $address
     * @return Response
     */
    public function update(Request $request, Address $address): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Address $address
     * @return Response
     */
    public function destroy(Address $address): Response
    {
        //
    }
}
