<?php


namespace App\Http\interfaces;


interface RepositoryInterface
{
    public function index();

    public function data();

    public function store(array $data);

    public function show($id);

    public function update(array $data , $id);

    public function destroy($id);



}
