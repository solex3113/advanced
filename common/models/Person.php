<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $photo
 * @property string $address
 * @property string $tel
 * @property integer $depart_ID
 *
 * @property Meeting[] $meetings
 * @property Depart $depart
 * @property User $user
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'firstname', 'lastname', 'depart_ID'], 'required'],
            [['user_id', 'depart_ID'], 'integer'],
            [['address'], 'string'],
            [['firstname', 'lastname'], 'string', 'max' => 100],
            [['photo'], 'string', 'max' => 200],
            [['tel'], 'string', 'max' => 45],
            /*[['depart_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Depart::className(), 'targetAttribute' => ['depart_ID' => 'ID']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
             * /
             */
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'photo' => 'Photo',
            'address' => 'Address',
            'tel' => 'Tel',
            'depart_ID' => 'Depart  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepart()
    {
        return $this->hasOne(Depart::className(), ['ID' => 'depart_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
