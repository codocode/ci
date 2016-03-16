

modules
	/controllers/users
					/users.php
					/admin_users.php
	/models/
			users_mdl.php
	/views/
			/frontend/
					/index.tpl
			/backend/
					/index.tpl


+ Add helper // 3/14/2016
reference: 
http://stackoverflow.com/questions/804399/codeigniter-create-new-helper
http://www.codexworld.com/create-custom-helper-in-codeigniter/ - with getting data from db
added:
E:\wamp\www\ci_login\application\helpers\common_helper.php 
- added functions for debugging
updated:
E:\wamp\www\ci_login\application\config\autoload.php 
- added 'common' on autoload helper





+ changed $this->load->view('admin/form', $data, TRUE);
E:\wamp\www\ci_login\application\core\My_Loader.php - changed view method based on hmvc view()
	- add restriction for admin and frontend
MVC
controllers
	test.php
		$this->load->view('test_view'); // test_view.php
		$this->load->view('test/test_view2'); // /test/test_view2.php
views/
	test_view.php
	/test/test_view2.php

HMVC
modules/
		test_view/
				controllers/
					test_view.php
						$this->load->view('test_view'); // test_view/views/test_view.php
						$this->load->view('test/test_view2'); // test_view/views/test/test_view2.php

						$this->load->view('test_view2/test_view'); // test_view2/views/test_view.php
						$this->load->view('test_view2/test/test_view2'); // test_view2/views/test/test_view2.php
				/views/
				test_view.php
					/test/
						test_view2.php
		test_view2/
				controllers/
					test_view2.php
				/views/
				test_view.php
					/test/
						test_view2.php