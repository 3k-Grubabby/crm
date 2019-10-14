<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  /**
   * 关联到模型的数据表
   *
   * @var string
   */
  protected $table = 'menu';

  /**
  * 模型主键
  * @var string
  */
  public $primaryKey = 'id';

    /**
   * 表明模型是否应该被打上时间戳
   *
   * @var bool
   */
  public $timestamps = false;


  public function childMenus() {
    return $this->hasMany('App\Models\Menu', 'pid', 'id');
  }

  public function allChildrenMenus()
  {
    return $this->childMenus()->with('allChildrenMenus');
  }
  
}
