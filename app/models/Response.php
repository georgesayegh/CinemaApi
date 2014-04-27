<?php
/**
 * Response Model Class
 *
 * PHP version 5.4
 *
 * LICENSE: This file is a property of Digital Pacific Pty Ltd
 *
 * @category  CinemaApp
 * @package   Response
 * @author    George Sayegh <george.sayegh@digitalpacific.com.au>
 * @copyright 2014 Digital Pacific Pty Ltd
 * @license   http://www.digitalpacific.com.au Digital Pacific License
 * @link      http://docs.digitalpacific.com/
 */
class Response extends Eloquent

{
    /**
     * This parameter is to be used to return either success or failure
     * after an api is called.
     *
     * @var string
     */
    protected $result = 'failure';
    
    /**
     * This parameter is to be used to return any error that might be
     * generated when the result is failure.
     * 
     * There might be multiple errors, each error will consists of an error
     * code and error message.
     *
     * @var array
     */
    protected $error = array();
    
    /**
     * This parameter is to be used to return the requested data.
     *
     * @var array
     */
    protected $data = array();
}
