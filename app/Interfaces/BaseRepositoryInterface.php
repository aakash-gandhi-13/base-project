<?php

namespace App\Interfaces;

interface BaseRepositoryInterface {
  public function all(); // Get all records
  public function store($request); // Create new record
  public function show($id); // Get single record
  public function update($request, $id); // Update existing record
  public function delete($id); // Destroy single record
}