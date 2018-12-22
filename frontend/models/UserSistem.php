<?php

namespace frontend\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\sdm\models\Pegawai;

use backend\modules\pelanggan\models\Role;

/**
 * This is the model class for table "agama".
 *
 * @property integer $id
 * @property string $nama
 */
class UserSistem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
   public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            
            ['nip', 'required'],
            
            ['nip', 'string', 'max' => 40],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
             ['new_password', 'required'],
      ['new_password', 'string', 'min' => 6],
 //          [['foto']],
           ['foto','string','max' => 40],
           [['foto'],'file','extensions'=>'jpg, jpeg,png', 'maxSize'=>1024 * 1024 * 1],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' =>'ID',
            'nip' =>'Nama Pegawai',
            'username' =>'User name',
            'password' =>'Password',
            'email'=>'Email',

            'foto' => 'Foto',
        ];
    }
     public function search($params)
    {
        $query = UserSistem::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'password'=>$this->password,
             'nip' => $this->nip,
        'foto' => $this->foto,
                  
        
        ]);

        return $dataProvider;
    }
       public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['nip' => 'nip']);
    }
       public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }
    public function upuser($id)
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user =  UserSistem::model()->findOne();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->nip = $this->nip;
          $user->foto = $this->foto;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
    public function upPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

     public static function pegawai($id){
        $mem = UserSistem::model()->findOne($id);
        //$criteria = new CDbCriteria ;
    //      $criteria->compare('nip', $mem->nip);
    $obj = Pegawai::model()->findOne($mem->nip);
    return $obj;

   }
}
