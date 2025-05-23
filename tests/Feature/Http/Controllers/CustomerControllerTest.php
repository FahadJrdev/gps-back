<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CustomerController
 */
final class CustomerControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $customers = Customer::factory()->count(3)->create();

        $response = $this->get(route('customers.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CustomerController::class,
            'store',
            \App\Http\Requests\CustomerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $identification = fake()->word();
        $user = User::factory()->create();
        $phone = fake()->phoneNumber();

        $response = $this->post(route('customers.store'), [
            'identification' => $identification,
            'user_id' => $user->id,
            'phone' => $phone,
        ]);

        $customers = Customer::query()
            ->where('identification', $identification)
            ->where('user_id', $user->id)
            ->where('phone', $phone)
            ->get();
        $this->assertCount(1, $customers);
        $customer = $customers->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $customer = Customer::factory()->create();

        $response = $this->get(route('customers.show', $customer));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CustomerController::class,
            'update',
            \App\Http\Requests\CustomerUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $customer = Customer::factory()->create();
        $identification = fake()->word();
        $user = User::factory()->create();
        $phone = fake()->phoneNumber();

        $response = $this->put(route('customers.update', $customer), [
            'identification' => $identification,
            'user_id' => $user->id,
            'phone' => $phone,
        ]);

        $customer->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($identification, $customer->identification);
        $this->assertEquals($user->id, $customer->user_id);
        $this->assertEquals($phone, $customer->phone);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $customer = Customer::factory()->create();

        $response = $this->delete(route('customers.destroy', $customer));

        $response->assertNoContent();

        $this->assertModelMissing($customer);
    }
}
