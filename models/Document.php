<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property int $project_id
 * @property string|null $src
 * @property string|null $text
 *
 * @property Project $project
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id'], 'required'],
            [['project_id'], 'integer'],
            [['text'], 'string', 'max' => 255],
            ['src','file', 'extensions' => 'png, jpg, jpeg'],
            [['src', 'text'], 'required', 'when' => function ($model) {
                $validate = empty($model->text) && empty($model->src);
                if ($validate) { return false; }
                return true;
                }, 'whenClient' => "function (attribute, value) {
                if($('#document-src').val() == '' && $('#document-text').val() == ''){
                $('.field-document-src, .field-document-text').addClass( 'has-error' ).find('.help-block-error').text( 'Необходимо заполнить хотя бы одно из полей «Графический файл» или «Текст»');
                return true;
                } else { 
                $('.field-document-src, .field-document-text').removeClass( 'has-error' ).find('.help-block-error').text('');
                return false;
                }
               }", 'message' => 'Необходимо заполнить хотя бы одно из полей «Графический файл» или «Текст»'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::class, 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'src' => 'Файл',
            'text' => 'Текст',
        ];
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
