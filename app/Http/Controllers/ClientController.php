<?php 
namespace app\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
	public function postSignUp(Request $request){
		$email = $request['email'];
		$firstName = $request['firstName'];
		$password = bcrypt($request['password']);

		$client = new Client();

		$client->email = $email;
		$client->firstName;
		$client->password;

		$client->save();

		return redirect()->back();

	}

	public function postSignIn(Request $request){

	}
}
 ?>
