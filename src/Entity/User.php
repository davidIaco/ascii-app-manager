<?php

namespace ASCII\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="user_mail", columns={"user_mail"})}, indexes={@ORM\Index(name="user_lvl_id", columns={"user_lvl_id"})})
 * @ORM\Entity
 */
class User
{
    /**
     * @var string
     *
     * @ORM\Column(name="user_mail", type="string", length=128, nullable=false)
     */
    private $userMail;

    /**
     * @var string
     *
     * @ORM\Column(name="user_pswd", type="string", length=128, nullable=false)
     */
    private $userPswd;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var \UserLvl
     *
     * @ORM\ManyToOne(targetEntity="\ASCII\Entity\UserLvl", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_lvl_id", referencedColumnName="lvl_id")
     * })
     */
    private $userLvl;



    /**
     * Set userMail
     *
     * @param string $userMail
     *
     * @return User
     */
    public function setUserMail($userMail)
    {
        $this->userMail = $userMail;

        return $this;
    }

    /**
     * Get userMail
     *
     * @return string
     */
    public function getUserMail()
    {
        return $this->userMail;
    }

    /**
     * Set userPswd
     *
     * @param string $userPswd
     *
     * @return User
     */
    public function setUserPswd($userPswd)
    {
        $this->userPswd = $userPswd;

        return $this;
    }

    /**
     * Get userPswd
     *
     * @return string
     */
    public function getUserPswd()
    {
        return $this->userPswd;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userLvl
     *
     * @param \ASCII\Entity\UserLvl $userLvl
     *
     * @return User
     */
    public function setUserLvl(\ASCII\Entity\UserLvl $userLvl = null)
    {
        $this->userLvl = $userLvl;

        return $this;
    }

    /**
     * Get userLvl
     *
     * @return \UserLvl
     */
    public function getUserLvl()
    {
        return $this->userLvl;
    }
}
