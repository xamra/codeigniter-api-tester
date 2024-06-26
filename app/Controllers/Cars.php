<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Exception;

class Cars extends ResourceController
{
    protected $modelName = 'App\Models\Cars';
    protected $format    = 'json';

    /**
     * route GET cars/
     * description return all cars
     */
    public function index()
    {
        //if (! $request->isSecure()) {
        //force_https();
        // }
        //    return $this->respond($this->request->getHeaderLine('Content-Type'));

        $cars = $this->model->findAll();
        if (!$cars) {
            return $this->failNotFound();
        }
        return $this->respond($cars);
    }


    /**
     * route GET cars/$id
     * description return a specific car
     */
    public function show($id = null)
    {
        $car = $this->model->find($id);
        if (!$car) {
            return $this->failNotFound();
        }
        return $this->respond($car);
    }

    /**
     * route POST cars/
     * description create a new car
     */
    /*
        {
            "make": "Ford",
            "model": "Mustang",
            "model_year": "1964",
            "vin": "WBA3V9C53FP387487"
        }
    */
    public function create()
    {
        /*   if (!$this->request->is("json")) {
            return $this->fail("Please provide valid json!");
        }*/

        //$data = $this->request->getJSON(true, JSON_THROW_ON_ERROR);
        $data = $this->request->getJSON();
        //        print_r($data);
        //return $data;

        /* if (!$data) {
            return $this->fail("Please provide valid json!");
        }

        $rules = $this->model->getValidationRules(['except' => ['id']]);

        if (!$this->validateData($data, $rules)) {
            $errors = $this->validator->getErrors();
            if ($errors) {
                // return $this->fail($errors, 500);
                return $this->failValidationErrors($errors);
            }
        }*/

        try {
            $car = $this->model->save($data);
            //       echo '#' . $car;
            if ($car == false) {
                return $this->fail("Could not be saved!", 500);
            }
            return $this->respondCreated($car, "resource was created");
        } catch (Exception $ex) {
            return $this->fail($ex, 400);
        }

        /*
        FUNKTIONIERT!
        $db = \Config\Database::connect();

        $sql = 'INSERT INTO cars (make, model, model_year, vin) VALUES ("Ford","Mustang","2024","ABCDEFG")';
        $db->query($sql);
        echo '#'.$db->affectedRows();
        */
    }


    /**
     * route PUT/PATCH cars/$id
     * description update a specific car
     */
    public function update($id = null)
    {
        if (!$this->request->is("json")) {
            return $this->fail("Please provide valid json!");
        }

        $data = $this->request->getJSON(true);

        /*  print_r($data);

        echo "'".$id."'";*/

        if (!$data) {
            return $this->fail("Please provide valid json!");
        }

        $rules = $this->model->getValidationRules();

        if (!$this->validateData($data, $rules)) {
            $errors = $this->validator->getErrors();
            if ($errors) {
                return $this->failValidationErrors($errors);
            }
        }

        try {
            $car = $this->model->update((int)$id, $data);
            if ($car == false) {
                return $this->fail("Data could not be updated!", 500);
            }
            return $this->respondUpdated($car, "resource was updated");
        } catch (Exception $ex) {
            return $this->fail($ex, 400);
        }

        // $data = $request->getRawInput();
    }


    /**
     * route DELETE cars/$id
     * description delete a specific car
     */
    public function delete($id = "")
    {
        $deleted = $this->model->delete($id);
        if ($deleted) {
            return $this->respond($deleted, 200, "OK");
        } else {
            return $this->fail("Data could not be deleted!", 500);
        }
    }
}
