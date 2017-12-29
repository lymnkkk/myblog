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
 *
<<<<<<< HEAD
 * @property User $fans0
 * @property User $idol0
=======
 * @property UserModel $fans0
 * @property UserModel $idol0
>>>>>>> 8b4a464f9c602228e37c0de20043a6ceb7a2df65
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
<<<<<<< HEAD
            [['fans'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fans' => 'id']],
            [['idol'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idol' => 'id']],
=======
            [['fans'], 'exist', 'skipOnError' => true, 'targetClass' => UserModel::className(), 'targetAttribute' => ['fans' => 'id']],
            [['idol'], 'exist', 'skipOnError' => true, 'targetClass' => UserModel::className(), 'targetAttribute' => ['idol' => 'id']],
>>>>>>> 8b4a464f9c602228e37c0de20043a6ceb7a2df65
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
<<<<<<< HEAD
        return $this->hasOne(User::className(), ['id' => 'fans']);
=======
        return $this->hasOne(UserModel::className(), ['id' => 'fans']);
>>>>>>> 8b4a464f9c602228e37c0de20043a6ceb7a2df65
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdol0()
    {
<<<<<<< HEAD
        return $this->hasOne(User::className(), ['id' => 'idol']);
=======
        return $this->hasOne(UserModel::className(), ['id' => 'idol']);
>>>>>>> 8b4a464f9c602228e37c0de20043a6ceb7a2df65
    }
}
