<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ServiceHistory;
use App\Models\Technician;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ServiceHistoryController
 */
final class ServiceHistoryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $serviceHistories = ServiceHistory::factory()->count(3)->create();

        $response = $this->get(route('service-histories.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceHistoryController::class,
            'store',
            \App\Http\Requests\ServiceHistoryStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $vehicle = Vehicle::factory()->create();
        $technician = Technician::factory()->create();
        $service_type = fake()->randomElement(/** enum_attributes **/);
        $scheduled_date = Carbon::parse(fake()->date());
        $observations = fake()->text();
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->post(route('service-histories.store'), [
            'vehicle_id' => $vehicle->id,
            'technician_id' => $technician->id,
            'service_type' => $service_type,
            'scheduled_date' => $scheduled_date->toDateString(),
            'observations' => $observations,
            'status' => $status,
        ]);

        $serviceHistories = ServiceHistory::query()
            ->where('vehicle_id', $vehicle->id)
            ->where('technician_id', $technician->id)
            ->where('service_type', $service_type)
            ->where('scheduled_date', $scheduled_date)
            ->where('observations', $observations)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $serviceHistories);
        $serviceHistory = $serviceHistories->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $serviceHistory = ServiceHistory::factory()->create();

        $response = $this->get(route('service-histories.show', $serviceHistory));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServiceHistoryController::class,
            'update',
            \App\Http\Requests\ServiceHistoryUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $serviceHistory = ServiceHistory::factory()->create();
        $vehicle = Vehicle::factory()->create();
        $technician = Technician::factory()->create();
        $service_type = fake()->randomElement(/** enum_attributes **/);
        $scheduled_date = Carbon::parse(fake()->date());
        $observations = fake()->text();
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->put(route('service-histories.update', $serviceHistory), [
            'vehicle_id' => $vehicle->id,
            'technician_id' => $technician->id,
            'service_type' => $service_type,
            'scheduled_date' => $scheduled_date->toDateString(),
            'observations' => $observations,
            'status' => $status,
        ]);

        $serviceHistory->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($vehicle->id, $serviceHistory->vehicle_id);
        $this->assertEquals($technician->id, $serviceHistory->technician_id);
        $this->assertEquals($service_type, $serviceHistory->service_type);
        $this->assertEquals($scheduled_date, $serviceHistory->scheduled_date);
        $this->assertEquals($observations, $serviceHistory->observations);
        $this->assertEquals($status, $serviceHistory->status);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $serviceHistory = ServiceHistory::factory()->create();

        $response = $this->delete(route('service-histories.destroy', $serviceHistory));

        $response->assertNoContent();

        $this->assertModelMissing($serviceHistory);
    }
}
