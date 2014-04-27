<?php
/**
 * MoviesController
 *
 * PHP version 5.4
 *
 * LICENSE: This file is a property of Digital Pacific Pty Ltd
 *
 * @category  CinemaApp
 * @package   MoviesController
 * @author    George Sayegh <george.sayegh@digitalpacific.com.au>
 * @copyright 2014 Digital Pacific Pty Ltd
 * @license   http://www.digitalpacific.com.au Digital Pacific License
 * @link      http://docs.digitalpacific.com/
 */
class MoviesController extends Controller
{
    /**
     * The API result used for the JSON response.
     *
     * @var array
     */
    protected $response = array('success' => false);

    /**
     * Get a list of available movies.
     *
     * @return array
     */
    public function index()
    {
        $movies = Movie::paginate(10);
        if (empty($movies)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found!';
        } else {
            $this->response['success'] = true;
            foreach($movies as $movie) {
                $this->response['data'][] = $movie->toArray();
            }
        }
        return Response::json($this->response);
    }
    
    /**
     * Get information about an individual movie.
     *
     * @return array
     */
    public function getOne($id)
    {
        $movie = Movie::find($id);
        if (empty($movie)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found';
        } else {
            $this->response['success'] = true;
            $this->response['data'][] = $movie->toArray();
        }
        return Response::json($this->response);
    }

    /**
     * Add new movie record.
     *
     * @param array  post   This is to used to pass data of a specific movie.
     *
     * @return array
     */
    public function add()
    {
        /*
         * TODO: Add validation
         */
        $movie        = new Movie;
        $movie->title = !empty($_GET['title']) ? $_GET['title'] : null;
        $movie->year  = !empty($_GET['year']) ? $_GET['year'] : null;
        $result       = $movie->save();
        if ($result == true) {
            $this->response['success'] = true;
            $this->response['data'][] = $movie->toArray();
        } else {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 0;
            $this->response['error'][0]['message'] = 'Unknown error';
        }
        return Response::json($this->response);
    }
    
    /**
     * Edit an existing movie record.
     *
     * @param array  post   This is to used to pass data of a specific movie.
     *
     * @return array
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        if (empty($movie)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found';
        } else {
            /*
             * TODO: Add validation
             */
            $movie->title = !empty($_GET['title']) ? $_GET['title'] : $movie->title;
            $movie->year  = !empty($_GET['year']) ? $_GET['year'] : $movie->year;
            $result          = $movie->save();
            if ($result == true) {
                $this->response['success'] = true;
                $this->response['data'][] = $movie->toArray();
            } else {
                $this->response['success'] = false;
                $this->response['error'][0]['code'] = 0;
                $this->response['error'][0]['message'] = 'Unknown error';
            }
        }
        return Response::json($this->response);
    }
    
    /**
     * Delete an existing movie record.
     *
     * @param array  post   This is to used to pass data of a specific movie.
     *
     * @return array
     */
    public function delete($id)
    {
        $movie = Movie::find($id);
        if (empty($movie)) {
            $this->response['success'] = false;
            $this->response['error'][0]['code'] = 1;
            $this->response['error'][0]['message'] = 'No records found';
        } else {
            if ($movie->delete() == true) {
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
