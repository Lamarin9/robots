<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $password
 * @property int $is_admin
 *
 * @property Project[] $projects
 */

class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $confirm_password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'surname', 'email', 'password', 'confirm_password'], 'required'],
            [['is_admin'], 'integer'],
            ['password', 'match', 'pattern' => '/(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*/', 'message'=> 'Одна цифра, буква в верхнем регистре, буква в нижнем регистре, спецсимвол'],
            [['confirm_password'], 'compare', 'compareAttribute'=>'password', 'message'=>'Пароли
            должны совпадать'],
            ['email', 'email'],
            ['username', 'match', 'pattern' => '/^[a-zA-Z]{6,}$/i', 'message'=> 'Латиница (минимум 6 символов)'],
            [['username', 'name', 'surname', 'email', 'password'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'email' => 'Почта',
            'password' => 'Пароль',
            'confirm_password' => 'Повтор пароля',
            'is_admin' => 'Is Admin',
        ];
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::class, ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
    return static::findOne($id);
    }
    public function isAdmin()
       {
       if(Yii::$app->user->identity->is_admin == 1)
       {    
       return 1;
       }
       else{
       return 0;
       }
       } 

       public function isConsultant($project)
       {
        return !Yii::$app->user->isGuest && $project->user_id == Yii::$app->user->identity->id;
       } 
       
    public static function findIdentityByAccessToken($token, $type = null)
    {
    return static::findOne(['access_token' => $token]);
    }
    public function getId()
    {
    return $this->id;
    }
    public function getAuthKey()
    {
    return ;
    }
    public function validateAuthKey($authKey)
    {
    return ;
    }
    public function validatePassword($password){
    return $this->password==$password;
    }
    public static function findByUsername($username){
    return self::find()->where(['username'=> $username])->one();
    }
}
