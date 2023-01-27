<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "all_order".
 *
 * @property int $id_order
 * @property int $user_id
 * @property int $product_id
 * @property int $count
 * @property string $reason
 * @property string $status
 * @property string $time
 *
 * @property Product $product
 * @property User $user
 */
class AllOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'all_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'count'], 'required'],
            [['user_id', 'product_id', 'count'], 'integer'],
            [['status'], 'string'],
            [['time'], 'safe'],
            [['reason'], 'string', 'max' => 500],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id_user']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id_product']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Заказа',
            'user_id' => 'Id Пользователя',
            'product_id' => 'Id Продукта',
            'count' => 'Количество',
            'reason' => 'Причина',
            'status' => 'Статус',
            'time' => 'Дата и время',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id_product' => 'product_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id_user' => 'user_id']);
    }
}
