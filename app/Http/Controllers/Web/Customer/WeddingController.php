<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Wedding\UpdateWeddingRequest;
use App\Models\Wedding;
use App\Services\CustomerService;
use App\Services\WeddingOrganizerService;
use Closure;
use Exception;
use Illuminate\Http\Request;

class WeddingController extends Controller
{
    /**
     * @var CustomerService
     */
    protected CustomerService $customerService;

    /**
     * @var WeddingOrganizerService
     */
    protected WeddingOrganizerService $weddingOrganizerService;

    /**
     * @param CustomerService $customerService
     * @param WeddingOrganizerService $weddingOrganizerService
     */
    public function __construct(CustomerService $customerService, WeddingOrganizerService $weddingOrganizerService)
    {
        $this->customerService = $customerService;
        $this->weddingOrganizerService = $weddingOrganizerService;

        $this->middleware(function (Request $request, Closure $next) {

            if ($request->user()->cannot('doAny', [Wedding::class, $request->route('username')])) {

                abort(404);
            }

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $weddings = $this->customerService->getCustomerWeddings($request->user()->customer);

            // 
        } catch (Exception $exception) {

            abort(502, $exception->getMessage());
        }

        return view('customer.wedding')->with('weddings', $weddings);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username, Wedding $wedding)
    {
        $this->authorize('view', $wedding);

        $wedding->load('invitations');

        return view('customer.wedding.show')->with('wedding', $wedding);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $username, Wedding $wedding)
    {
        $this->authorize('update', $wedding);

        return view('customer.wedding.edit')->with('wedding', $wedding);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWeddingRequest $request, string $username, Wedding $wedding)
    {
        $this->authorize('update', $wedding);

        try {

            $this->weddingOrganizerService->updateWedding($wedding, $request->all());

            // 
        } catch (Exception $exception) {

            abort(502, $exception->getMessage());
        }

        return back()->with('success', 'The wedding was successfully renewed.');
    }
}
