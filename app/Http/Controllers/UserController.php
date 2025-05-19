<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    public function index(Request $request): UserCollection
    {
        $perPage = $request->input('per_page', 15);
        $page = $request->input('page', 1);
        
        $users = User::query()
            ->orderBy('created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);

        return new UserCollection($users);
    }

    public function store(UserStoreRequest $request): UserResource
    {
        $data = $request->validated();
        
        // Handle base64 image upload
        if (isset($data['profile_image'])) {
            $data['profile_image'] = $this->storeBase64Image($data['profile_image']);
        }
        
        $user = User::create($data);

        return new UserResource($user);
    }

    public function show(Request $request, User $user): UserResource
    {
        return new UserResource($user);
    }

    public function update(UserUpdateRequest $request, User $user): UserResource
    {
        $data = $request->validated();
        
        unset($data['password']);
        
        if (array_key_exists('profile_image', $data)) {
            $this->handleProfileImageUpdate($user, $data['profile_image']);
            $data['profile_image'] = $user->profile_image;
        }
        
        $user->update($data);

        return new UserResource($user);
    }

    public function destroy(Request $request, User $user): Response
    {
        $user->delete();

        return response()->noContent();
    }

    protected function handleProfileImageUpdate(User $user, ?string $newImage): void
    {
        if ($user->profile_image) {
            Storage::disk('direct')->delete($user->profile_image);
        }
        
        $user->profile_image = $newImage 
            ? $this->storeBase64Image($newImage)
            : null;
    }

    protected function storeBase64Image($base64String)
    {
        // Extract image type and data
        if (preg_match('/^data:image\/(\w+);base64,/', $base64String, $matches)) {
            $imageType = $matches[1];
            $imageData = substr($base64String, strpos($base64String, ',') + 1);
            $imageData = base64_decode($imageData);
            
            if ($imageData === false) {
                throw new \Exception('Invalid base64 image data');
            }
            
            $fileName = 'profile-images/' . Str::uuid() . '.' . strtolower($imageType);
            Storage::disk('direct')->put($fileName, $imageData);
            
            return $fileName;
        }
        
        throw new \Exception('Invalid image format');
    }

}
