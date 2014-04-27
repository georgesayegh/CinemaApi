<?php
/**
 * MovieSessionsController
 *
 * PHP version 5.4
 *
 * LICENSE: This file is a property of Digital Pacific Pty Ltd
 *
 * @category  CinemaApp
 * @package   MovieSessionsController
 * @author    George Sayegh <george.sayegh@digitalpacific.com.au>
 * @copyright 2014 Digital Pacific Pty Ltd
 * @license   http://www.digitalpacific.com.au Digital Pacific License
 * @link      http://docs.digitalpacific.com/
 */
class MovieSessionsController extends Controller
{
    /**
     * The API result used for the JSON response.
     *
     * @var array
     */
    protected $response = array('success' => false);

    /**
     * Get a list of available movie sessions.
     *
     * @return array
     */
    public function index()
    {
        $movieSessions = MovieSession::paginate(10);
        if (empty($movieSessions)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found!';
        } else {
            $this->response['success'] = true;
            foreach($movieSessions as $movieSession) {
                $this->response['data'][] = $movieSession->toArray();
            }
        }
        return Response::json($this->response);
    }
    
    /**
     * Get information about an individual movie session.
     *
     * @return array
     */
    public function getOne($id)
    {
        $movieSession = MovieSession::find($id);
        if (empty($movieSession)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found';
        } else {
            $this->response['success'] = true;
            $this->response['data'][] = $movieSession->toArray();
        }
        return Response::json($this->response);
    }

    /**
     * Add new movie session record.
     *
     * @param array  post   This is to used to pass data of a specific movie session
     * .
     *
     * @return array
     */
    public function add()
    {
        /*
         * TODO: Add validation
         */
        $movieSession            = new MovieSession;
        $movieSession->movie_id  = !empty($_GET['movie_id']) ? (int)$_GET['movie_id'] : null;
        $movieSession->cinema_id = !empty($_GET['cinema_id']) ? (int)$_GET['cinema_id'] : null;
        $movieSession->datetime  = !empty($_GET['datetime']) ? $_GET['datetime'] : null;
        $result                  = $movieSession->save();
        if ($result == true) {
            $this->response['success'] = true;
            $this->response['data'][] = $movieSession->toArray();
        } else {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 0;
            $this->response['error'][0]['message'] = 'Unknown error';
        }
        return Response::json($this->response);
    }
    
    /**
     * Edit an existing movie session record.
     *
     * @param array  post   This is to used to pass data of a specific movie session.
     *
     * @return array
     */
    public function edit($id)
    {
        $movieSession = MovieSession::find($id);
        if (empty($movieSession)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found';
        } else {
            /*
             * TODO: Add validation
             */
            $movieSession->movie_id  = !empty($_GET['movie_id']) ? (int)$_GET['movie_id'] : $movieSession->movie_id;
            $movieSession->cinema_id = !empty($_GET['cinema_id']) ? (int)$_GET['cinema_id'] : $movieSession->cinema_id;
            $movieSession->datetime  = !empty($_GET['datetime']) ? $_GET['datetime'] : $movieSession->datetime;
            $result          = $movieSession->save();
            if ($result == true) {
                $this->response['success'] = true;
                $this->response['data'][] = $movieSession->toArray();
            } else {
                $this->response['success'] = false;
                $this->response['error'][0]['code'] = 0;
                $this->response['error'][0]['message'] = 'Unknown error';
            }
        }
        return Response::json($this->response);
    }
    
    /**
     * Delete an existing movie session record.
     *
     * @param array  post   This is to used to pass data of a specific movie session.
     *
     * @return array
     */
    public function delete($id)
    {
        $movieSession = MovieSession::find($id);
        if (empty($movieSession)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found';
        } else {
            if ($movieSession->delete() == true) {
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
