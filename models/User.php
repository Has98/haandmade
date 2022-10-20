<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $role_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property int $age
 * @property string $gender
 * @property string $avatar
 * @property string $auth_key
 * @property string $password
 * @property string $password_reset_token
 * @property int $status
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    const ADMIN_ROLE = 1;
    const SHOP_ROLE = 2;
    const USER_ROLE = 3;

    public $file;
    public $newpassword;
    public $passwordconfirm;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'first_name', 'last_name', 'email', 'password'], 'required'],
            [['role_id', 'age', 'status'], 'integer'],
            [['first_name', 'gender'], 'string', 'max' => 100],
            [['last_name', 'phone', 'avatar', 'auth_key', 'password', 'password_reset_token'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 150],
            [['email'], 'email'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['newpassword', 'passwordconfirm', 'created_at', 'updated_at'], 'safe'],
            ['newpassword', 'string', 'min' => 6],
            ['passwordconfirm', 'compare', 'compareAttribute' => 'newpassword'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'role_id' => Yii::t('app', 'Role ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'age' => Yii::t('app', 'Age'),
            'gender' => Yii::t('app', 'Gender'),
            'avatar' => Yii::t('app', 'avatar'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password' => Yii::t('app', 'Password'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function beforeSave($insert)
    {
        if($this->newpassword != null){
           $this->setPassword($this->newpassword);
        }
        return parent::beforeSave($insert);
    }

    public static function findIdentity($id)
    {
       return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

   /**
    * @inheritdoc
    */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

   /**
    * Finds user by email
    *
    * @param string $email
    * @return static|null
    */
    public static function findByUsername($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

   /**
    * Finds user by password reset token
    *
    * @param string $token password reset token
    * @return static|null
    */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

   /**
    * Finds out if password reset token is valid
    *
    * @param string $token password reset token
    * @return boolean
    */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
    * @inheritdoc
    */
    public function getId()
    {
       return $this->getPrimaryKey();
    }

    /**
    * @inheritdoc
    */
    public function getAuthKey()
    {
       return $this->auth_key;
    }

    /**
    * @inheritdoc
    */
    public function validateAuthKey($authKey)
    {
       return $this->getAuthKey() === $authKey;
    }

    /**
    * Validates password
    *
    * @param string $password password to validate
    * @return boolean if password provided is valid for current user
    */
    public function validatePassword($password)
    {
       return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
    * Generates password hash from password and sets it to the model
    *
    * @param string $password
    */
    public function setPassword($password)
    {
       $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
    * Generates "remember me" authentication key
    */
    public function generateAuthKey()
    {
       $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
    * Generates new password reset token
    */
    public function generatePasswordResetToken()
    {
       $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
    * Removes password reset token
    */
    public function removePasswordResetToken()
    {
       $this->password_reset_token = null;
    }
}
