<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "miss_detail".
 *
 * @property int $id_miss
 * @property string $icon
 * @property int $category
 * @property string $descritption
 * @property string $comment
 * @property int $count
 * @property string $name
 *
 * @property ProjectMiss[] $projectMisses
 */
class MissDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'miss_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icon', 'category', 'descritption', 'comment', 'count', 'name'], 'required'],
            [['category', 'count'], 'integer'],
            [['icon', 'descritption', 'comment', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_miss' => 'Id Miss',
            'icon' => 'Icon',
            'category' => 'Category',
            'descritption' => 'Descritption',
            'comment' => 'Comment',
            'count' => 'Count',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[ProjectMisses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectMisses()
    {
        return $this->hasMany(ProjectMiss::class, ['id' => 'id_miss']);
    }
}
