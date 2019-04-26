<?php
/**
 * 
 */
class LeagueController extends BaseController
{
    private $model;
    function __construct()
    {
        $this->model = new League();
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

    public function addLeague($request)
    {
        $this->model->setCountry($request['country']);
        $this->model->setName($request['name']);
        $this->model->setLogo($request['logo']);
        $simpan = $this->model->create();
        if ($simpan === true) {
            $this->response(200);
        } else {
            $this->response(500, $simpan);
        }
    }

    public function listAllTeam()
    {
        $data = $this->model->getTeams($id);
        if (!empty($data)) {
            $this->response(200, $data);
        } else {
            $this->response(200, 'Data not found');
        }
    }

    public function getLeagueAndAllTeam($id)
    {
        $league = $this->model->getById($id);
        $teams = $this->model->getTeams($id);
        $res['league'] = $league;
        $res['teams'] = $teams;

        if (!empty($res['league'])) {
            $this->response(200, $res);
        } else {
            $this->response(200, 'Data not found');
        }
    }
}