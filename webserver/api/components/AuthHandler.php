<?php
namespace api\components;

use Yii;
use yii\authclient\ClientInterface;
use yii\helpers\ArrayHelper;
use api\models\UserAuth as Auth;

/**
 * AuthHandler handles successful authentication via Yii auth component
 */
class AuthHandler
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function handle()
    {
        $attributes = $this->client->getUserAttributes();
        // $email = ArrayHelper::getValue($attributes, 'email');
        $openid = ArrayHelper::getValue($attributes, 'openid');
        $unionid = ArrayHelper::getValue($attributes, 'unionid');
        $nickname = ArrayHelper::getValue($attributes, 'nickname');

        /* @var Auth $auth */
        $auth = Auth::find()->where([
            'source' => $this->client->getId(),// weixin
            'source_id' => $openid,
        ])->one();

        if (!$auth) {
            $auth = new Auth([
                'source' => $this->client->getId(),
                'source_id' => (string)$openid,
                'user_id' => 0,
                'unionid' => (string)$unionid,
            ]);

            $auth->save();
        }

        return $auth;
    }

    // /**
    //  * @param User $user
    //  */
    // private function updateUserInfo(User $user)
    // {
    //     $attributes = $this->client->getUserAttributes();
    //     $weixin = ArrayHelper::getValue($attributes, 'login');
    //     if ($user->weixin === null && $weixin) {
    //         $user->weixin = $weixin;
    //         $user->save();
    //     }
    // }
}