<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\GpsDevice;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\GpsDeviceController
 */
final class GpsDeviceControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $gpsDevices = GpsDevice::factory()->count(3)->create();

        $response = $this->get(route('gps-devices.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GpsDeviceController::class,
            'store',
            \App\Http\Requests\GpsDeviceStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $vehicle = Vehicle::factory()->create();
        $imei = fake()->word();
        $device_type = fake()->word();
        $manufacturer = fake()->word();
        $model = fake()->word();
        $firmware_version = fake()->word();
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->post(route('gps-devices.store'), [
            'vehicle_id' => $vehicle->id,
            'imei' => $imei,
            'device_type' => $device_type,
            'manufacturer' => $manufacturer,
            'model' => $model,
            'firmware_version' => $firmware_version,
            'status' => $status,
        ]);

        $gpsDevices = GpsDevice::query()
            ->where('vehicle_id', $vehicle->id)
            ->where('imei', $imei)
            ->where('device_type', $device_type)
            ->where('manufacturer', $manufacturer)
            ->where('model', $model)
            ->where('firmware_version', $firmware_version)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $gpsDevices);
        $gpsDevice = $gpsDevices->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $gpsDevice = GpsDevice::factory()->create();

        $response = $this->get(route('gps-devices.show', $gpsDevice));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GpsDeviceController::class,
            'update',
            \App\Http\Requests\GpsDeviceUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $gpsDevice = GpsDevice::factory()->create();
        $vehicle = Vehicle::factory()->create();
        $imei = fake()->word();
        $device_type = fake()->word();
        $manufacturer = fake()->word();
        $model = fake()->word();
        $firmware_version = fake()->word();
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->put(route('gps-devices.update', $gpsDevice), [
            'vehicle_id' => $vehicle->id,
            'imei' => $imei,
            'device_type' => $device_type,
            'manufacturer' => $manufacturer,
            'model' => $model,
            'firmware_version' => $firmware_version,
            'status' => $status,
        ]);

        $gpsDevice->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($vehicle->id, $gpsDevice->vehicle_id);
        $this->assertEquals($imei, $gpsDevice->imei);
        $this->assertEquals($device_type, $gpsDevice->device_type);
        $this->assertEquals($manufacturer, $gpsDevice->manufacturer);
        $this->assertEquals($model, $gpsDevice->model);
        $this->assertEquals($firmware_version, $gpsDevice->firmware_version);
        $this->assertEquals($status, $gpsDevice->status);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $gpsDevice = GpsDevice::factory()->create();

        $response = $this->delete(route('gps-devices.destroy', $gpsDevice));

        $response->assertNoContent();

        $this->assertModelMissing($gpsDevice);
    }
}
