<?php 
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use \Validator;
use Input;
use Image;
class Product extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['category_id', 'title', 'price', 'description', 'image'];

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

    public function category()
    {
      return $this->belongsTo('App\Category');
    }

    public function feature()
    {
      return $this->hasMany('App\Feature');
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
          'title' => 'required|max:60',
          'category_id' => 'required|max:60', 
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
        throw new \Exception("Invalid input");
      } else {
          $pass_validator = Validator::make($data, array('password' => 'confirmed'));
        }
        


        //Fill product with the new data
        $this->title = trim($data['title']);
        $this->category_id = trim($data['category_id']);
        $this->price = trim($data['price']);
        $this->description = trim($data['description']);

$image = Input::file('image');

      $filename = date('Y-m-d') . "-" . $image->getClientOriginalName();
     $path = asset('local/media/images/products/' . $filename);
       Image::make($image->getRealPath())->resize(430, 550)->save('local/media/images/products/' . $filename);





        $this->image = $filename;
        $this->save();
        

      }
    
    public function delete()
    {
      parent::delete();

    }



    public function section($a){
 $i = 0; 
$summa = 0;
    foreach ($a as $one){
        $summa += $one->rate; 
        $i++;
        $summa/$i;
  }
  if($summa !== 0){
  $rating = round($summa/$i, 0, PHP_ROUND_HALF_UP);
}
  else {
    $rating = 0;
  }

      switch ($rating) {
                                            case '1':
                                               $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '2':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '3':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '4':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '5':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>';
                                                break;
                                            default:
                                                 $first = '<i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                            break;

                                        }
            return $first;
    }

}
