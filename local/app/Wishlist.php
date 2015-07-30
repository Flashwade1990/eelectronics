<?php 
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use \Validator;

class Wishlist extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'wishlists';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['product_id'];

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


   /* public function canPerformAction(Array $item)
    {
      $can = true;
      
      if (!$this->hasRole('admin')) {
       $can = false;
      }
      
      return $can;
    }
    
    public function getValidationRules()
    {
      return array(
          'title' => 'required|max:60',
          'category' => 'required|max:60', 
          'price' => 'required|numeric',
          'description' => 'required',
          'image' => 'required'
      );
    }
    
    public function store(Array $data)
    {
      $validator = Validator::make($data, $this->getValidationRules());
      
      if ($validator->fails()) {
        $this->validation_errors = $validator->messages();
        throw new \Exception("Invalid user input");
      }
        
        //Fill user with the new data
        $this->title = trim($data['title']);
        $this->category = trim($data['category']);
        $this->price = trim($data['price']);
        $this->description = trim($data['description']);
        $this->image = trim($data['image']);
        $this->save();


      
    }*/
    
    public function delete()
    {
      parent::delete();
      
    }

}
