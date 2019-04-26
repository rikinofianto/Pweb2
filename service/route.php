<?php
require_once 'config.php';

if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add-league':
            $controller = new LeagueController();
            $controller->addLeague($_POST);
            break;

        case 'league':
            $controller = new LeagueController();
            $controller->listAll();
            break;

        case 'league-detail':
            $controller = new LeagueController();
            $controller->getLeagueAndAllTeam($_GET['id']);
            break;

        case 'add-team':
            $controller = new TeamController();
            $controller->addTeam($_POST);
            break;

        case 'team':
            $controller = new TeamController();
            $controller->listAll();
            break;

        case 'team-detail':
            $controller = new TeamController();
            $controller->getTeamAndAllPlayer($_GET['id']);
            break;

        case 'add-player':
            $controller = new PlayerController();
            $controller->addPlayer($_POST);
            break;

        case 'player':
            $controller = new PlayerController();
            $controller->listAll();
            break;

        case 'player-detail':
            $controller = new PlayerController();
            $controller->getPlayer($_GET['id']);
            break;


        default:

            break;
    }
}