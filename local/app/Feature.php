<?php 
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use \Validator;

class Feature extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'features';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['product_id', 'name', 'email', 'rate', 'review'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
    
    public $validation_errors;
    
    /**
     * Returns true if the user has permissions to see an action
     * Default is true if no restrictions are present
     * @param array $item array('permission' => permissionName, 'role' => roleName)
     */

    
    public function delete()
    {
      parent::delete();
      
    }

        public function product()
    {
      return $this->belongsTo('App\Product');
    }

}
