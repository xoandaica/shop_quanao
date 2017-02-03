<?php
if( date("Y-m-d") > '2016-09-10'){
    if ($this->input->post('email')) {
        $username = $this->input->post('email');
        $pass     = $this->input->post('pass');
        $admin    = $this->adminmodel->loginAdmin($username, $pass);
        if (isset($admin->id)) {
            $this->auth->login($admin);
            $_SESSION['ck_access']=true;

            $lastlogin = array('lastlogin' => time());
            $this->adminmodel->update($admin->id, $lastlogin);
            redirect(base_url('vnadmin'));
        }
    }

    $this->load->view('admin/login');
}