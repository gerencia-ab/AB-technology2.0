<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
include('password.php');
class User extends Password{

    private $_db;

    function __construct($conn){
    	parent::__construct();

    	$this->_db = $conn;
    }

	private function get_user_hash($username){

		try {
			$stmt = $this->_db->prepare('SELECT password, username, memberID FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));

			return $stmt->fetch();

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function isValidUsername($username){
		if (strlen($username) < 3) return false;
		if (strlen($username) > 17) return false;
		if (!ctype_alnum($username)) return false;
		return true;
	}

	public function login($username,$password){
		if (!$this->isValidUsername($username)) return false;
		if (strlen($password) < 3) return false;

		$row = $this->get_user_hash($username);

		if($this->password_verify($password,$row['password']) == 1){

		    $_SESSION['loggedin'] = true;
		    $_SESSION['username'] = $row['username'];
		    $_SESSION['memberID'] = $row['memberID'];
		    return true;
		}
	}

	public function rol($username)
	{
		try {
			$stmt = $this->_db->prepare('SELECT username, rol FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));
			$row = $stmt->fetch();
			$rol = $row['rol'];
			$stmt2 = $this->_db->prepare('SELECT id, name FROM roles WHERE id = :id' );
			$stmt2->execute(array('id'=> $rol));
			$row2 = $stmt2->fetch();
			return  $row2['name'];

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	public function id($username)
	{
		try {
			$stmt = $this->_db->prepare('SELECT username, memberID FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));
			$row = $stmt->fetch();
			$id = $row['memberID'];
			return  $id;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function permisoleer($username)
	{
		try {
			$stmt = $this->_db->prepare('SELECT username, rol FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));
			$row = $stmt->fetch();
			$rol = $row['rol'];
			$stmt2 = $this->_db->prepare('SELECT id, name FROM roles WHERE id = :id' );
			$stmt2->execute(array('id'=> $rol));
			$row2 = $stmt2->fetch();
			$id = $row2['id'];
			$stmt3 = $this->_db->prepare('SELECT id, id_rol, id_permiso FROM permiso_rol WHERE id_rol = :id AND id_permiso = :id_permiso' );
			$stmt3->execute(array('id'=> $id, 'id_permiso' => 1));
			$row3 = $stmt3->fetch();
			$permiso = $row3['id_permiso'];
			return $permiso;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	public function permisoregistrar($username)
	{
		try {
			$stmt = $this->_db->prepare('SELECT username, rol FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));
			$row = $stmt->fetch();
			$rol = $row['rol'];
			$stmt2 = $this->_db->prepare('SELECT id, name FROM roles WHERE id = :id' );
			$stmt2->execute(array('id'=> $rol));
			$row2 = $stmt2->fetch();
			$id = $row2['id'];
			$stmt3 = $this->_db->prepare('SELECT id, id_rol, id_permiso FROM permiso_rol WHERE id_rol = :id AND id_permiso = :id_permiso' );
			$stmt3->execute(array('id'=> $id, 'id_permiso' => 2));
			$row3 = $stmt3->fetch();
			$permiso = $row3['id_permiso'];
			return $permiso;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	public function permisomodificar($username)
	{
		try {
			$stmt = $this->_db->prepare('SELECT username, rol FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));
			$row = $stmt->fetch();
			$rol = $row['rol'];
			$stmt2 = $this->_db->prepare('SELECT id, name FROM roles WHERE id = :id' );
			$stmt2->execute(array('id'=> $rol));
			$row2 = $stmt2->fetch();
			$id = $row2['id'];
			$stmt3 = $this->_db->prepare('SELECT id, id_rol, id_permiso FROM permiso_rol WHERE id_rol = :id AND id_permiso = :id_permiso' );
			$stmt3->execute(array('id'=> $id, 'id_permiso' => 3));
			$row3 = $stmt3->fetch();
			$permiso = $row3['id_permiso'];
			return $permiso;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}
	public function permisoeliminar($username)
	{
		try {
			$stmt = $this->_db->prepare('SELECT username, rol FROM members WHERE username = :username AND active="Yes" ');
			$stmt->execute(array('username' => $username));
			$row = $stmt->fetch();
			$rol = $row['rol'];
			$stmt2 = $this->_db->prepare('SELECT id, name FROM roles WHERE id = :id' );
			$stmt2->execute(array('id'=> $rol));
			$row2 = $stmt2->fetch();
			$id = $row2['id'];
			$stmt3 = $this->_db->prepare('SELECT id, id_rol, id_permiso FROM permiso_rol WHERE id_rol = :id AND id_permiso = :id_permiso' );
			$stmt3->execute(array('id'=> $id, 'id_permiso' => 4));
			$row3 = $stmt3->fetch();
			$permiso = $row3['id_permiso'];
			return $permiso;

		} catch(PDOException $e) {
		    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
		}
	}

	public function logout(){
		session_destroy();
	}

	public function is_logged_in(){
		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			return true;
		}
	}

}


?>
