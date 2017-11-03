<?php

namespace ASCII\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserLvl
 *
 * @ORM\Table(name="user_lvl", uniqueConstraints={@ORM\UniqueConstraint(name="lvl_name", columns={"lvl_name"})})
 * @ORM\Entity
 */
class UserLvl
{
    /**
     * @var string
     *
     * @ORM\Column(name="lvl_name", type="string", length=32, nullable=false)
     */
    private $lvlName;

    /**
     * @var integer
     *
     * @ORM\Column(name="lvl_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lvlId;



    /**
     * Set lvlName
     *
     * @param string $lvlName
     *
     * @return UserLvl
     */
    public function setLvlName($lvlName)
    {
        $this->lvlName = $lvlName;

        return $this;
    }

    /**
     * Get lvlName
     *
     * @return string
     */
    public function getLvlName()
    {
        return $this->lvlName;
    }

    /**
     * Get lvlId
     *
     * @return integer
     */
    public function getLvlId()
    {
        return $this->lvlId;
    }
}
