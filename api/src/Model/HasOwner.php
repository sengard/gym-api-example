<?php


namespace App\Model;


use App\Entity\User;

interface HasOwner
{
    public function getUser();
    public function setUser(User $owner);
}
