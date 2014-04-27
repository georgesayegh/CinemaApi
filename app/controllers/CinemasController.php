<?php
/**
 * CinemasController
 *
 * PHP version 5.4
 *
 * LICENSE: This file is a property of Digital Pacific Pty Ltd
 *
 * @category  CinemaApp
 * @package   CinemasController
 * @author    George Sayegh <george.sayegh@digitalpacific.com.au>
 * @copyright 2014 Digital Pacific Pty Ltd
 * @license   http://www.digitalpacific.com.au Digital Pacific License
 * @link      http://docs.digitalpacific.com/
 */
class CinemasController extends Controller
{
    /**
     * The API result used for the JSON response.
     *
     * @var array
     */
    protected $response = array('success' => false);

    /**
     * Get a list of available cinemas.
     *
     * @return array
     */
    public function index()
    {
        $cinemas = Cinema::paginate(10);
        if (empty($cinemas)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found!';
        } else {
            $this->response['success'] = true;
            foreach($cinemas as $cinema) {
                $this->response['data'][] = $cinema->toArray();
            }
        }
        return Response::json($this->response);
    }
    
    /**
     * Get information about an individual cinema.
     *
     * @return array
     */
    public function getOne($id)
    {
        $cinema = Cinema::find($id);
        if (empty($cinema)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found';
        } else {
            $this->response['success'] = true;
            $this->response['data'][] = $cinema->toArray();
        }
        return Response::json($this->response);
    }

    /**
     * Add new cinema record.
     *
     * @param array  post   This is to used to pass data of a specific cinema.
     *
     * @return array
     */
    public function add()
    {
        /*
         * TODO: Add validation
         */
        $cinema          = new Cinema;
        $cinema->name    = !empty($_GET['name']) ? $_GET['name'] : null;
        $cinema->address = !empty($_GET['address']) ? $_GET['address'] : null;
        $cinema->geo     = !empty($_GET['geo']) ? $_GET['geo'] : null;
        $result          = $cinema->save();
        if ($result == true) {
            $this->response['success'] = true;
            $this->response['data'][] = $cinema->toArray();
        } else {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 0;
            $this->response['error'][0]['message'] = 'Unknown error';
        }
        return Response::json($this->response);
    }
    
    /**
     * Edit an existing cinema record.
     *
     * @param array  post   This is to used to pass data of a specific cinema.
     *
     * @return array
     */
    public function edit($id)
    {
        $cinema = Cinema::find($id);
        if (empty($cinema)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found';
        } else {
            /*
             * TODO: Add validation
             */
            $cinema->name    = !empty($_GET['name']) ? $_GET['name'] : $cinema->name;
            $cinema->address = !empty($_GET['address']) ? $_GET['address'] : $cinema->address;
            $cinema->geo     = !empty($_GET['geo']) ? $_GET['geo'] : $cinema->geo;
            $result          = $cinema->save();
            if ($result == true) {
                $this->response['success'] = true;
                $this->response['data'][] = $cinema->toArray();
            } else {
                $this->response['success'] = false;
                $this->response['error'][0]['code'] = 0;
                $this->response['error'][0]['message'] = 'Unknown error';
            }
        }
        return Response::json($this->response);
    }
    
    /**
     * Delete an existing cinema record.
     *
     * @param array  post   This is to used to pass data of a specific cinema.
     *
     * @return array
     */
    public function delete($id)
    {
        $cinema = Cinema::find($id);
        if (empty($cinema)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found';
        } else {
            if ($cinema->delete() == true) {
                $this->response['success'] = true;
            } else {
                $this->response['success'] = false;
                $this->response['error'][0]['code'] = 0;
                $this->response['error'][0]['message'] = 'Unknown error';
            }
        }
        return Response::json($this->response);
    }
}
