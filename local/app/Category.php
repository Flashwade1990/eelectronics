<?php 
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use \Validator;

class Category extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];

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


    public function product()
    {
      return $this->hasMany('App\Product');
    }

    


 public function canPerformAction(Array $item)
    {
      $can = true;
      
      if (!$this->hasRole('admin')) {
        if (isset($item['permission'])) {
          $can = $this->can($item['permission']);
        } elseif (isset($item['role'])) {
          $can = $this->hasRole($item['role']);
        }
      }
      
      return $can;
    }
    
    public function getValidationRules()
    {
      return array(
          'name' => 'required|max:60'
      );
    }
    
    public function store(Array $data)
    {
      $validator = Validator::make($data, $this->getValidationRules());
      
      if ($validator->fails()) {
        $this->validation_errors = $validator->messages();
        throw new \Exception("Invalid input");
      } else {

          $pass_validator = Validator::make($data, array('password' => 'confirmed'));

        }
        
        //Fill user with the new data
        $this->name = trim($data['name']);
        $this->save();

      }
    
    public function delete()
    {
      parent::delete();

    }


}
