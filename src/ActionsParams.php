<?php

namespace Romss;



use App\Services\UserServices;

class ActionsParams
{
    /**
     * @var UserServices
     */
    private $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    public function setFlash($type, $content)
    {
        $_SESSION['flash'] = compact('type', 'content');
    }


    protected function generateToken($user = null)
    {
        if ($user) {
            $token = $user['id'].'---'.hash('sha512', $user['email'].'#~!*$'.$user['password']);
        } else {
            $token = hash('sha512', uniqid().'---'.time());
            $_SESSION['csrf'] = $token;
        }
        return $token;
    }
}