<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CustomerService
{
    /**
     * @var Customer
     */
    protected Customer $customer;

    /**
     * @var User
     */
    protected User $user;

    /**
     * @param Customer $customer
     */
    public function __construct(Customer $customer, User $user)
    {
        $this->customer = $customer;
        $this->user = $user;
    }

    /**
     * @param array $with
     * 
     * @return Collection|LengthAwarePaginator
     */
    public function orderByIdDesc(int $perPage = 0, array $with = [])
    {
        return $perPage > 0 ?
            $this->customer->with($with)->orderBy('id', 'DESC')->paginate($perPage) :
            $this->customer->with($with)->orderBy('id', 'DESC')->get();
    }

    /**
     * @param array $attributes
     * 
     * @return Model
     */
    public function createCustomer(array $attributes = []): Model
    {
        $user = $this->user->create($attributes);
        $user->assignRole('customer');

        $customer = $this->customer->newInstance($attributes);
        $customer->user()->associate($user);
        $customer->save();

        return $customer;
    }

    /**
     * @param Customer $customer
     * @param array $attributes
     * 
     * @return Model
     */
    public function updateCustomer(Customer $customer, array $attributes = []): Model
    {
        $customer->update($attributes);
        $customer->user->update($attributes);

        return $customer;
    }

    /**
     * @param Customer $customer
     * 
     * @return bool|int|null
     */
    public function deleteCustomer(Customer $customer): bool|int|null
    {
        return $customer->user->delete();
    }

    /**
     * @param Customer $customer
     * 
     * @return Collection|null
     */
    public function getCustomerWeddings(Customer $customer): Collection|null
    {
        return $customer->weddings;
    }
}
