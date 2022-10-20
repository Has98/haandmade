<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object".
 *
 * @property int $id
 * @property int $user_id
 * @property int $cat_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property int $status
 * @property string $price
 * @property int $sale_price
 */
class Object1 extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'cat_id', 'title', 'description', 'price'], 'required'],
            [['user_id', 'cat_id', 'status', 'sale_price', 'price'], 'integer'],
            [['description'], 'string'],
            [['title', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'cat_id' => Yii::t('app', 'Cat ID'),
            'title' => Yii::t('app', 'title'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
            'price' => Yii::t('app', 'Price'),
            'sale_price' => Yii::t('app', 'Sale Price'),
        ];
    }
}
