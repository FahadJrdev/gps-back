<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\VehicleController
 */
final class VehicleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $vehicles = Vehicle::factory()->count(3)->create();

        $response = $this->get(route('vehicles.index'));
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VehicleController::class,
            'store',
            \App\Http\Requests\VehicleStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $customer = Customer::factory()->create();
        $type = fake()->word();
        $license_plate = fake()->word();
        $make = fake()->word();
        $model = fake()->word();
        $year = fake()->numberBetween(-10000, 10000);
        $color = fake()->word();
        $registration_date = Carbon::parse(fake()->date());
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->post(route('vehicles.store'), [
            'customer_id' => $customer->id,
            'type' => $type,
            'license_plate' => $license_plate,
            'make' => $make,
            'model' => $model,
            'year' => $year,
            'color' => $color,
            'registration_date' => $registration_date->toDateString(),
            'status' => $status,
        ]);

        $vehicles = Vehicle::query()
            ->where('customer_id', $customer->id)
            ->where('type', $type)
            ->where('license_plate', $license_plate)
            ->where('make', $make)
            ->where('model', $model)
            ->where('year', $year)
            ->where('color', $color)
            ->where('registration_date', $registration_date)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $vehicles);
        $vehicle = $vehicles->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $vehicle = Vehicle::factory()->create();

        $response = $this->get(route('vehicles.show', $vehicle));
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\VehicleController::class,
            'update',
            \App\Http\Requests\VehicleUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $vehicle = Vehicle::factory()->create();
        $customer = Customer::factory()->create();
        $type = fake()->word();
        $license_plate = fake()->word();
        $make = fake()->word();
        $model = fake()->word();
        $year = fake()->numberBetween(-10000, 10000);
        $color = fake()->word();
        $registration_date = Carbon::parse(fake()->date());
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->put(route('vehicles.update', $vehicle), [
            'customer_id' => $customer->id,
            'type' => $type,
            'license_plate' => $license_plate,
            'make' => $make,
            'model' => $model,
            'year' => $year,
            'color' => $color,
            'registration_date' => $registration_date->toDateString(),
            'status' => $status,
        ]);

        $vehicle->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($customer->id, $vehicle->customer_id);
        $this->assertEquals($type, $vehicle->type);
        $this->assertEquals($license_plate, $vehicle->license_plate);
        $this->assertEquals($make, $vehicle->make);
        $this->assertEquals($model, $vehicle->model);
        $this->assertEquals($year, $vehicle->year);
        $this->assertEquals($color, $vehicle->color);
        $this->assertEquals($registration_date, $vehicle->registration_date);
        $this->assertEquals($status, $vehicle->status);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $vehicle = Vehicle::factory()->create();

        $response = $this->delete(route('vehicles.destroy', $vehicle));

        $response->assertNoContent();

        $this->assertModelMissing($vehicle);
    }
}
