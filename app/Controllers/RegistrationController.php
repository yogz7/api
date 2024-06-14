<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class RegistrationController extends BaseController
{
    use ResponseTrait;

    public function create()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'license_plate' => $this->request->getPost('license_plate'),
            'vehicle_type' => $this->request->getPost('vehicle_type')
        ];

        $userModel = new UserModel();

        if ($userModel->insert($data)) {
            return $this->respondCreated(['status' => 'success', 'message' => 'User registered successfully']);
        } else {
            return $this->failValidationErrors($userModel->errors());
        }
    }
}
