<?php

namespace App\Controllers;

use Exception;

use App\Libraries\TestLibrary;

class Welcome extends \CodeIgniter\Controller
{

    public $parseObject;

    public function __construct()
    {
        $this->parseObject = \Config\Services::parser();
    }

    public function index()
    {
        return view('welcome_message');
    }
    public function test($id, $name)
    {
        echo "Welcome to CI4 with $id and with $name";
    }
    public function _remap($method, $parm1 = null, $parm2 = null)
    {
        if (method_exists($this, $method)) {
            return $this->$method($parm1, $parm2);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function blog()
    {
        $data = [
            'name' => 'Deepinder',
            'phone' => '9915099247',
            'class' => 'Cse',
            'subject_list_loop' => [
                ['subject' => 'hindi', 'marks' => 20],
                ['subject' => 'Punjabi', 'marks' => 33],
                ['subject' => 'English', 'marks' => 90],
            ],
            'status' => true
        ];

        return $this->parseObject->setData($data)->render('firstView');
    }
    public function parsedata()
    {

        $data = [
            'heading' => 'This is first page',
            'name' => 'Deepinder singh',
            'dob' => '24-11-1993 21:23:23',
            'salary' => '37500',
            'gig' => '3.35',
            'description' => 'Hey my name is deepinder singh i am a webdeveloper.',
            'phone' => '9915099247'
        ];

        return $this->parseObject->setData($data)->render('parseview');
    }
    public function home()
    {
        $data = [
            'heading' => 'Home Page',
            'header' => 'This is Home Page Header',
            'body' => 'This is Home Page Body',
            'footer' => 'This is Home Page Footer'
        ];
        return view('home', $data);
    }

    public function about()
    {
        $data = [
            'heading' => 'About Page',
            'header' => 'This is About Page Header',
            'body' => 'This is About Page Body',
            'footer' => 'This is About Page Footer'
        ];
        return view('about', $data);
    }
    public function stringRoute($name, $class)
    {

        echo $name . '  :  ' . $class;
        exit;
    }
    public function databaseConnect()
    {
        $db1 = \Config\Database::connect();
        // $db2 = \Config\Database::connect('seconddb');
        $result = $db1->query('SELECT * FROM user ORDER BY full_name ASC')->getResult();
        echo "<pre>";
        print_r($result);
    }
    public function modelData()
    {
        $model = new \App\Models\UserModel();
        $data = $model->getDatabaseData();
        echo "<pre>";
        print_r($data);
    }
    public function myLibrary()
    {
        $testObject = new TestLibrary();
        echo $testObject->getData();
    }
    public function sendMail()
    {
        $email = \Config\Services::email();

        $email->setFrom('deepinder999@gmail.com', 'Deepinder singh');
        $email->setto('skorminda@gmail.com');
        // $email->setBCC('deepinder999@gmail.com');
        // $email->setCC('deepinder999@gmail.com');
        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');
        $filepath = 'public/assests/fiverr.jpg';
        $email->attach($filepath);
        if ($email->send()) {
            echo "sent";
        } else {
            echo "<pre>";
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
    public function myhellper()
    {
        helper(['form', 'html', 'cookie', 'array']);

        echo form_open();
        echo form_input('firstname', 'Deepinder singh');
        echo form_close();
        echo "<br/>";
        echo base_url();
        echo "<br/>";
        echo current_url();
        echo "<br/>";
        echo getRandom([12, 45, 67, 88, 33, 22]);
    }
    public function myform()
    {
        $data = [];
        $data['validation'] = null;
        if (isset($_POST['send']) && $this->request->getMethod() == 'post') {
            // $rules = [
            //     'username' => 'required',
            //     'email' => 'required|valid_email',
            //     'phone_number' => 'required|numeric|exact_length[10]',

            // ];

            $rules = [
                'username' =>
                [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please Enter Username',
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Please Enter Email id',
                        'valid_email' => 'Please Enter Valid Email id'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'Please Enter Password',
                        'min_length' => 'Please Enter more then 8 Charcters'
                    ]
                ],
                'phone_number' => [
                    'rules' => 'required|numeric|exact_length[10]',
                    'errors' => [
                        'required' => 'Please Enter Phone',
                        'numeric' => '{value} Should be Numbers',
                        'exact_length' => '{value} Should be Only 10 Characters ',
                    ]
                ],
                'message' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => 'Please Enter Message',
                    ]
                ],
            ];



            if ($this->validate($rules)) {

                $uni_id = md5(str_shuffle('abcdegfrdhjlkjljas' . time()));
                $data = [
                    'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
                    'phone_number' => $this->request->getVar('phone_number', FILTER_SANITIZE_NUMBER_INT),
                    'email' => $this->request->getVar('email', FILTER_SANITIZE_EMAIL),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'message' => $this->request->getVar('message', FILTER_SANITIZE_STRING),
                    'uni_id' => $uni_id,
                    'status' => 0,
                    'activation_date' => date('Y-m-d H:i:s', strtotime('+1 hour')),
                    'created_at' => date('Y-m-d H:i:s'),
                ];

                $model = new \App\Models\UserModel();
                $session = \CodeIgniter\Config\Services::session();

                $check = $model->saveUserData($data);
                if ($check) {

                    $to = $this->request->getVar('email');
                    $subject = 'Account Activation Link';
                    $message = 'Hi. ' . $data['username'] . '<br/><br/> Thanks your account Created successfully. Please Click the below link to activate your <br/><br/> <a href="' . base_url('Welcome/activate/' . $uni_id) . '">Actiavte Now</a><br/><br/>Thanks';


                    $email = \Config\Services::email();

                    $email->setFrom('deepinder999@gmail.com', 'Deepinder singh');
                    $email->setto($to);
                    // $email->setBCC('deepinder999@gmail.com');
                    // $email->setCC('deepinder999@gmail.com');
                    $email->setSubject($subject);
                    $email->setMessage($message);

                    if ($email->send()) {
                        echo "sent";
                    } else {
                        echo "<pre>";
                        $data = $email->printDebugger(['headers']);
                        print_r($data);
                    }

                    $session->setTempdata('success', 'Thanx we will get back you soon', 3);
                    return redirect()->to(current_url());
                } else {
                    $session->setTempdata('error', 'Sorry ! try Again', 3);
                    return redirect()->to(current_url());
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }


        helper(['url', 'form', 'form_helper']);
        return view('my_form', $data);
    }
    public function activate($uni_id = null)
    {
        if (!empty($uni_id)) {
            $model = new \App\Models\UserModel();
            $result = $model->verifyUnid($uni_id);



            if (!empty($result)) {
                if ($this->verifyExpriyTime($result->activation_date)) {
                    if ($result->status == 0) {
                        $status  = $model->updateStatus($uni_id);
                        if ($status === TRUE) {
                            echo "Account Activated Successfully";
                        } else {
                            echo "OOPS Database Problem";
                        }
                    } else {
                        echo "Sorry ! Your account is already activated";
                    }
                } else {
                    echo "Sorry ! your link expired";
                }
            } else {
                return "Sorry ! we are unable to find your account";
            }
        } else {
            return "Sorry ! unable to proccess your request";
        }
    }

    public function verifyExpriyTime($regTime)
    {
        helper(['date']);
        $currTime = now();
        $regTime = strtotime($regTime);
        $diffTime = (int)$currTime - (int)$regTime;
        if (3600 < $diffTime) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
