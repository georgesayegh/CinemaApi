<?php
/**
 * UsersController
 *
 * PHP version 5.4
 *
 * LICENSE: This file is a property of Digital Pacific Pty Ltd
 *
 * @category  CinemaApp
 * @package   UsersController
 * @author    George Sayegh <george.sayegh@digitalpacific.com.au>
 * @copyright 2014 Digital Pacific Pty Ltd
 * @license   http://www.digitalpacific.com.au Digital Pacific License
 * @link      http://docs.digitalpacific.com/
 */
class UsersController extends Controller
{
    /**
     * The API result used for the JSON response.
     *
     * @var array
     */
    protected $result = array('success' => false);

    /**
     * Authenticate user.
     *
     * @return string
     */
    public function auth()
    {
        /*
         * TODO:
         * Switch from get method to post method.
         */
        $username = !empty($_GET['username']) ? $_GET['username'] : null;
        $password = !empty($_GET['password']) ? $_GET['password'] : null;
        if (Auth::attempt(array('username' => $username, 'password' => $password, 'active' => 1))) {
            $this->result['success'] = true;
            $this->result['data']    = array('_token' => csrf_token());
        } else {
            $this->result['success']             = false;
            $this->result['error'][0]['code']    = 0;
            $this->result['error'][0]['message'] = 'Invalid username and/or password';
        }
        return Response::json($this->result);
    }
}
