<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Wedding\StoreWeddingRequest;
use App\Http\Requests\Wedding\UpdateWeddingRequest;
use App\Models\Customer;
use App\Models\Wedding;
use App\Services\CustomerService;
use App\Services\WeddingOrganizerService;
use Exception;
use Illuminate\Http\Request;

class WeddingController extends Controller
{
    /**
     * @var WeddingOrganizerService
     */
    protected WeddingOrganizerService $weddingOrganizerService;

    public function __construct(WeddingOrganizerService $weddingOrganizerService)
    {
        $this->weddingOrganizerService = $weddingOrganizerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $weddings = $this->weddingOrganizerService->orderByIdDesc(15, ['owner']);

            // 
        } catch (Exception $exception) {

            abort(502, $exception->getMessage());
        }

        return view('wedding')->with('weddings', $weddings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer = null, CustomerService $customerService)
    {
        try {

            $customers = $customerService->orderByIdDesc();

            // 
        } catch (Exception $exception) {

            abort(502, $exception->getMessage());
        }

        return view('wedding.create')->with([
            'customers' => $customers,
            'defaultCustomer' => $customer,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWeddingRequest $request)
    {
        try {

            $this->weddingOrganizerService->createWedding($request->all());

            // 
        } catch (Exception $exception) {

            abort(502, $exception->getMessage());
        }

        return redirect()->route('weddings')->with('success', 'Successfully created a new wedding.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wedding $wedding)
    {
        $wedding->load('owner', 'owner.user');

        return view('wedding.show')->with('wedding', $wedding);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wedding $wedding, CustomerService $customerService)
    {
        try {

            $customers = $customerService->orderByIdDesc();

            // 
        } catch (Exception $exception) {

            abort(502, $exception->getMessage());
        }

        return view('wedding.edit')->with([
            'customers' => $customers,
            'wedding' => $wedding,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWeddingRequest $request, Wedding $wedding)
    {
        try {

            $this->weddingOrganizerService->updateWedding($wedding, $request->all());

            // 
        } catch (Exception $exception) {

            dd($exception);

            abort(502, $exception->getMessage());
        }

        return back()->with('success', 'The wedding was successfully renewed.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wedding $wedding)
    {
        $wedding->delete();

        return back()->with('success', 'The wedding was successfully deleted.');
    }
}
