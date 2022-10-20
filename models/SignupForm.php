<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

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
class SignupForm extends User
{
    public $file;
    public $newpassword;
    public $passwordconfirm;

    public $id;
    public $role_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $age;
    public $gender;
    public $avatar;
    public $auth_key;
    public $password;
    public $password_reset_token;
    public $status;

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
            'avatar' => Yii::t('app', 'Avatar'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password' => Yii::t('app', 'Password'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->role_id = $this->role_id;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->age = $this->age;
        $user->gender = $this->gender;
        // Upload avatar
        $this->file = UploadedFile::getInstance($this, 'file');
        $imageName = "{$this->file}";
        if(!empty($this->file)) {
            $this->file->saveAs('upload/images/users/'.$imageName);
            $user->avatar = 'upload/images/users/'.$imageName;
        }

        $user->status = User::STATUS_ACTIVE;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}
