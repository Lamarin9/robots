<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_miss".
 *
 * @property int $id_miss
 * @property int $project_id
 * @property int $id
 *
 * @property MissDetail $id0
 * @property Project $project
 */
class ProjectMiss extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_miss';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'id'], 'required'],
            [['project_id', 'id'], 'integer'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::class, 'targetAttribute' => ['project_id' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => MissDetail::class, 'targetAttribute' => ['id' => 'id_miss']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_miss' => 'Id Miss',
            'project_id' => 'Project ID',
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(MissDetail::class, ['id_miss' => 'id']);
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::class, ['id' => 'project_id']);
    }
}
