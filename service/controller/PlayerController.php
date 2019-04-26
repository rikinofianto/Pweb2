<?php
/**
 * 
 */
class PlayerController extends BaseController
{
    private $model;
    function __construct()
    {
        $this->model = new Player();
    }

    public function listAll()
    {
        $data = $this->model->getAll();
        if (!empty($data)) {
            $this->response(200, $data);
        } else {
            $this->response(200, 'Data not found');
        }
    }

    public function addPlayer($request)
    {
        $this->model->setTeamId($request['team_id']);
        $this->model->setName($request['name']);
        $this->model->setBirthDate($request['birth_date']);
        $this->model->setPosition($request['position']);
        $this->model->setJerseyNumber($request['jersey_number']);
        $this->model->setImage($request['image']);
        $simpan = $this->model->create();
        if ($simpan === true) {
            $this->response(200);
        } else {
            $this->response(500, $simpan);
        }
    }

    public function getPlayer($id)
    {
        $data = $this->model->getById($id);

        if (!empty($data)) {
            $this->response(200, $data);
        } else {
            $this->response(200, 'Data not found');
        }
    }
}