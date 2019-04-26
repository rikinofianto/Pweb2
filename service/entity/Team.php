<?php

/**
 * 
 */
class Team extends Database
{
    private $table = 'team';

    private $id;
    private $league_id;
    private $name;
    private $city;
    private $logo;

    function __construct()
    {

    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setLeagueId($league_id)
    {
        $this->league_id = $league_id;
        return $this;
    }

    public function getLeagueId()
    {
        return $this->league_id;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function getAll()
    {
        return $this->connect()->query("SELECT team.id, league.name AS league_name, team.city, team.logo, team.name FROM $this->table JOIN league ON league.id = team.league_id ORDER BY `name`")->fetchAll();
    }

    public function getPlayers($id)
    {
        return $this->connect()->prepare("SELECT * FROM player WHERE team_id = :id")->bindParam(':id', $id, PDO::PARAM_INT)->fetchAll();
    }


    public function create()
    {
        try {
            $stmt = $this->connect()->prepare("INSERT INTO $this->table SET league_id = :league_id, name = :name, city = :city, logo = :logo");
            $stmt->bindParam(':league_id', $this->league_id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':city', $this->city, PDO::PARAM_STR);
            $stmt->bindParam(':logo', $this->logo, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}