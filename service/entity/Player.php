<?php
/**
 * 
 */
class Player extends Database
{
    private $table = 'player';

    private $id;
    private $team_id;
    private $name;
    private $birth_date;
    private $position;
    private $jersey_number;
    private $image;

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

    public function setTeamId($team_id)
    {
        $this->team_id = $team_id;
        return $this;
    }

    public function getTeamId()
    {
        return $this->team_id;
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

    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
        return $this;
    }

    public function getBirthDate()
    {
        return $this->birth_date;
    }

    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setJerseyNumber($jersey_number)
    {
        $this->jersey_number = $jersey_number;
        return $this;
    }

    public function getJerseyNumber()
    {
        return $this->jersey_number;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getAll()
    {
        return $this->connect()->query("SELECT player.id, team.name AS team_name, player.position, player.image, player.jersey_number, player.name FROM $this->table JOIN team ON team.id = player.team_id ORDER BY player.`name`")->fetchAll();
    }

    public function create()
    {
        try {
            $stmt = $this->connect()->prepare("INSERT INTO $this->table SET team_id = :team_id, name = :name, birth_date = :birth_date, position = :position, jersey_number = :jersey_number, image = :image");
            $stmt->bindParam(':team_id', $this->team_id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindParam(':birth_date', $this->birth_date, PDO::PARAM_STR);
            $stmt->bindParam(':position', $this->position, PDO::PARAM_STR);
            $stmt->bindParam(':jersey_number', $this->jersey_number, PDO::PARAM_INT);
            $stmt->bindParam(':image', $this->image, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}