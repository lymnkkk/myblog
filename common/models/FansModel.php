<?php

namespace common\models;

use common\models\base\BaseModel;
use Yii;

/**
 * This is the model class for table "fans".
 *
 * @property integer $id
 * @property integer $fans
 * @property integer $idol


 * @property UserModel $fans0
 * @property UserModel $idol0
 */
class FansModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fans';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fans', 'idol'], 'required'],
            [['fans', 'idol'], 'integer'],

            [['fans'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fans' => 'id']],
            [['idol'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idol' => 'id']],

            [['fans'], 'exist', 'skipOnError' => true, 'targetClass' => UserModel::className(), 'targetAttribute' => ['fans' => 'id']],
            [['idol'], 'exist', 'skipOnError' => true, 'targetClass' => UserModel::className(), 'targetAttribute' => ['idol' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fans' => 'Fans',
            'idol' => 'Idol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFans0()
    {

        return $this->hasOne(User::className(), ['id' => 'fans']);

        return $this->hasOne(UserModel::className(), ['id' => 'fans']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdol0()
    {

        return $this->hasOne(User::className(), ['id' => 'idol']);

        return $this->hasOne(UserModel::className(), ['id' => 'idol']);

    }
}
