<?php

namespace SV\UserBundle\Entity;

use FOS\UserBundle\Model\User as FOSUser;

/**
 * User
 */
class User extends FOSUser
{
    /**
     * @var int
     */
    protected $id;
}
