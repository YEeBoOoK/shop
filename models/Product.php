<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id_product
 * @property string $image
 * @property string $name
 * @property int $price
 * @property string $country_of_origin
 * @property int $category_id
 * @property string $color
 * @property int $left_product
 *
 * @property AllOrder[] $allOrders
 * @property Cart[] $carts
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'name', 'price', 'country_of_origin', 'category_id', 'color', 'left_product'], 'required'],
            [['price', 'category_id', 'left_product'], 'integer'],
            [['image', 'country_of_origin'], 'string', 'max' => 200],
            [['name', 'color'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id_category']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id Product',
            'image' => 'Image',
            'name' => 'Name',
            'price' => 'Price',
            'country_of_origin' => 'Country Of Origin',
            'category_id' => 'Category ID',
            'color' => 'Color',
            'left_product' => 'Left Product',
        ];
    }

    /**
     * Gets query for [[AllOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAllOrders()
    {
        return $this->hasMany(AllOrder::class, ['product_id' => 'id_product']);
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['product_id' => 'id_product']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id_category' => 'category_id']);
    }
}
