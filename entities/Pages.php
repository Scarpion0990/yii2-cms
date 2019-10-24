<?php

<<<<<<< HEAD
namespace abdualiym\cms\entities;

use abdualiym\cms\validators\SlugValidator;
use abdualiym\cms\helpers\LanguageHelper;
=======
namespace abdualiym\cms\models;

use abdualiym\cms\entities\user\User;
use common\helpers\LanguageHelper;
use common\helpers\StringHelper;
>>>>>>> 8b48ef3ca164c7e9625a53ec14596f9d17e4ff8e
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "abdualiym_cms_pages".
 *
 * @property int $id
 * @property string $title_0
 * @property string $title_1
 * @property string $title_2
 * @property string $title_3
 * @property string $slug
 * @property string $content_0
 * @property string $content_1
 * @property string $content_2
 * @property string $content_3
 * @property int $created_at
 * @property int $updated_at
 */
class Pages extends \yii\db\ActiveRecord
{
    private $CMSModule;

    public function __construct($config = [])
    {
        $this->CMSModule = Yii::$app->getModule('cms');
        parent::__construct($config);
    }

    public static function tableName()
    {
        return 'abdualiym_cms_pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['title_0', 'required', 'when' => function () {
                return in_array(0, $this->CMSModule->languages);
            }],
            ['title_1', 'required', 'when' => function () {
                return in_array(1, $this->CMSModule->languages);
            }],
            ['title_2', 'required', 'when' => function () {
                return in_array(2, $this->CMSModule->languages);
            }],
            ['title_3', 'required', 'when' => function () {
                return in_array(3, $this->CMSModule->languages);
            }],

            [['title_0', 'title_1', 'title_2', 'title_3', 'slug'], 'string', 'max' => 255],
            ['slug', 'required'],
            [['slug'], 'unique'],
            [['slug'], SlugValidator::class],

            [['content_0', 'content_1', 'content_2', 'content_3'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        $language0 = $this->CMSModule->languages[0] ?? '';
        $language1 = $this->CMSModule->languages[1] ?? '';
        $language2 = $this->CMSModule->languages[2] ?? '';
        $language3 = $this->CMSModule->languages[3] ?? '';

        return [
            'id' => Yii::t('app', 'ID'),
            'title_0' => Yii::t('app', 'Title') . '(' . $language0 . ')',
            'title_1' => Yii::t('app', 'Title') . '(' . $language1 . ')',
            'title_2' => Yii::t('app', 'Title') . '(' . $language2 . ')',
            'title_3' => Yii::t('app', 'Title') . '(' . $language3 . ')',
            'slug' => Yii::t('app', 'Slug'),
            'content_0' => Yii::t('app', 'Content') . '(' . $language0 . ')',
            'content_1' => Yii::t('app', 'Content') . '(' . $language1 . ')',
            'content_2' => Yii::t('app', 'Content') . '(' . $language2 . ')',
            'content_3' => Yii::t('app', 'Content') . '(' . $language3 . ')',
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

}
