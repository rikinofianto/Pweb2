<?php
/**
 * 
 */
class TeamController extends BaseController
{
    private $model;
    function __construct()
    {
        $this->model = new Team();
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

    public function addTeam($request)
    {
        $this->model->setLeagueId($request['league_id']);
        $this->model->setName($request['name']);
        $this->model->setCity($request['city']);
        $this->model->setLogo($request['logo']);
        $simpan = $this->model->create();
        if ($simpan === true) {
            $this->response(200);
        } else {
            $this->response(500, $simpan);
        }
    }

    public function listAllPlayer()
    {
        $data = $this->model->getPlayers();
        if (!empty($data)) {
            $this->response(200, $data);
        } else {
            $this->response(200, 'Data not found');
        }
    }

    public function getTeamAndAllPlayer($id)
    {
        $team = $this->model->getById($id);
        $players = $this->model->getPlayers($id);
        $res['team'] = $team;
        $res['players'] = $players;
        if (!empty($res['team'])) {
            $this->response(200, $res);
        } else {
            $this->response(200, 'Data not found');
        }
    }
}