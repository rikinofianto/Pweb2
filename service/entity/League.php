<?php
/**
 * 
 */
class League extends Database
{
    private $id;
    private $country;
    private $name;
    private $logo;
    private $table = 'league';
    private $connect;

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

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
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
        return $this->connect()->query("SELECT * FROM $this->table ORDER BY `name`")->fetchAll();
    }

    public function getTeams($id)
    {
        $data = $this->connect()->prepare("SELECT league.name AS league_name, team.* FROM team JOIN league ON league.id = team.league_id WHERE team.league_id = :id");
        $data->execute(['id' => $id]);

        return $data->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create()
    {
        try {
            $stmt = $this->connect()->prepare("INSERT INTO $this->table SET country = :country, name = :name, logo = :logo");
            $stmt->bindParam(':country', $this->country, PDO::PARAM_STR);
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':logo', $this->logo, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        $data = $this->connect()->prepare("SELECT * FROM $this->table WHERE id = :id");
        $data->execute(['id' => $id]);

        return $data->fetch(PDO::FETCH_ASSOC);
    }

}