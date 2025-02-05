<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 * @property int $category_id
 * @property string $description
 * @property string $comment
 *
 * @property Category $category
 * @property DetailPhoto[] $detailPhotos
 * @property ProjectDetail[] $projectDetails
 */
class Detail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'icon', 'category_id', 'description', 'comment', 'count'], 'required'],
            [['category_id', 'count'], 'integer'],
            [['name', 'icon', 'description', 'comment'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'icon' => 'Изображение',
            'category_id' => 'Категория',
            'description' => 'Описание',
            'comment' => 'Комментарий',
            'count' => 'Количество',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[DetailPhotos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPhotos()
    {
        return $this->hasMany(DetailPhoto::class, ['detail_id' => 'id']);
    }

    /**
     * Gets query for [[ProjectDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectDetails()
    {
        return $this->hasMany(ProjectDetail::class, ['detail_id' => 'id']);
    }
}
